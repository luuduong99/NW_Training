<?php

namespace App\Services\Students;

use App\Enums\Page;
use App\Http\Requests\Students\AddPointStudentRequest;
use App\Http\Requests\Students\CreateOrUpdateStudentRequest;
use App\Imports\PointImport;
use App\Repositories\Faculties\FacultyRepository;
use App\Repositories\Roles\RoleRepository;
use App\Repositories\Students\StudentRepository;
use App\Repositories\Subjects\SubjectRepository;
use App\Repositories\Users\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;


class StudentService
{
    protected $studentRepository, $userRepository, $facultyRepository, $subjectRepository,
        $roleRepository;

    public function __construct(StudentRepository        $studentRepository, UserRepository $userRepository,
                                FacultyRepository        $facultyRepository,
                                SubjectRepository        $subjectRepository, RoleRepository $roleRepository)
    {
        $this->studentRepository = $studentRepository;
        $this->userRepository = $userRepository;
        $this->facultyRepository = $facultyRepository;
        $this->subjectRepository = $subjectRepository;
        $this->roleRepository = $roleRepository;
    }

    public function getAllStudent(Request $request)
    {
        $faculties = $this->facultyRepository->getAll();
        $students = $this->studentRepository->filter($request->all());

        return view('students.index', ['students' => $students, 'faculties' => $faculties]);
    }

    public function createStudent()
    {
        $faculties = $this->facultyRepository->getAll();

        return view('students.create', ['faculties' => $faculties]);
    }


    public function storeStudent($request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();

            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $ext = strtolower($file->getClientOriginalExtension());
                $avatar = rand() . '.' . $ext;
                $file->move('images/students', $avatar);
                $data['avatar'] = $avatar;
            }

            $data['password'] = Hash::make('123456');
            if ($user = $this->userRepository->create($data)) {
                $request['user_id'] = $user->id;
                $this->roleRepository->create($data);
                $this->studentRepository->create($data);

                dispatch(new \App\Jobs\SendMailRegister($data));
            }
            DB::commit();

            if ($request->ajax()) {
                return response()->json(['success' => 'Successfully added student.']);
            }

            return redirect()->route('edu.students.index')->with('add_student',
                'Successfully added student.');
        } catch (\Throwable $th) {
            DB::rollBack();
            if ($request->ajax()) {
                return response()->json();
            }
        }
    }

    public function editStudent($id)
    {
        $student = $this->studentRepository->find($id);
        if (!$student) {
            abort(404);
        }
        $faculties = $this->facultyRepository->getAll();
        return view('students.update', ['student' => $student, 'faculties' => $faculties]);
    }

    public function updateStudent($request, $id)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $student = $this->studentRepository->find($id);
            if ($request->hasFile('avatar')) {
                if (
                    isset($student->avatar) && file_exists('images/students/' . $student->avatar) &&
                    $student->avatar != ""
                ) {
                    unlink('images/students/' . $student->avatar);
                }

                $file = $request->file('avatar');
                $ext = strtolower($file->getClientOriginalExtension());
                $avatar = rand() . '.' . $ext;
                $file->move('images/students', $avatar);
                $data['avatar'] = $avatar;
            }
            if ($user = $this->userRepository->update($student->user_id, $data)) {
                $user->role->update($data);
                $this->studentRepository->update($id,$data);
            }
            DB::commit();

            return redirect()->route('edu.students.index')->with('update_student',
                'Successfully update student.');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
        }
    }

    public function deleteStudent($id)
    {
        DB::beginTransaction();
        try {
            $student = $this->studentRepository->find($id);

            if (!$student) {
                abort(404);
            } else {
                if (
                    isset($student->avatar) && file_exists('images/students/' . $student->avatar)
                    && $student->avatar != ""
                ) {
                    unlink('images/students/' . $student->avatar);
                }

                if ($student->user) {
                    $student->user->delete();
                    $student->user->role->delete();
                    $student->delete();
                }
                DB::commit();

                return redirect()->route('edu.students.index')->with('delete_student',
                    'Successfully delete student.');
            }

        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
        }
    }

    public function profile($id)
    {
        $student = $this->studentRepository->find($id);
        if (!$student) {
            abort(404);
        }

        return view('students.profile', ['student' => $student]);
    }

    public function registerMultipleSubject(Request $request)
    {
        DB::beginTransaction();
        try {
            $subjects = $request->subject_id;
            $student_id = Auth::user()->student->id;
            $student = $this->studentRepository->find($student_id);
            $student->subjects()->attach($subjects, ['faculty_id' => $student->faculty->id]);
            DB::commit();

            return redirect()->route('edu.subjects.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
        }
    }

    public function sendNoitice($id)
    {
        $attr = [];
        $student = $this->studentRepository->find($id);
        if (!$student) {
            abort(404);
        }
        $data = $student->subjects->pluck('id')->toArray();
        $subjects = $student->faculty->subjects;
        foreach ($subjects as $subject) {
            if (!in_array($subject->id, $data)) {
                array_push($attr, $subject->name);
            }
        }

        $mail = dispatch(new \App\Jobs\SendMailNotificationSubject($student->user->email, $attr));

        if ($mail) {

            return redirect()->back()->with('send_mail_success', 'Successful notification sent');
        } else {

            return redirect()->back()->with('send_mail_false', 'Send notification failed');
        }

    }

    public function importPoints(Request $request)
    {
        try {
            $file = $request->file('excel_file');
            Excel::import(new PointImport(), $file);

            return redirect()->route('edu.students.index')->with('import_success', 'Successfully import student');

        } catch (\Throwable $e) {

            return redirect()->back()->with('import_false', 'Import student failed');
        }
    }

    public function listPointOfStudent($id)
    {
        $student = $this->studentRepository->find($id);
        if (!$student) {
            abort(404);
        }
        $subjectsWithPoint = $student->subjects()->wherePivot('point', '!=', null)->get();
        $subjectsNotPoint = $student->subjects()->wherePivot('point', null)->get();

        return view('students.multiple_add_point', ['student' => $student, 'id' => $id,
            'subjectsNotPoint' => $subjectsNotPoint, 'subjectsWithPoint' => $subjectsWithPoint]);
    }

    public function ajaxGetPoint(Request $request)
    {
        $student = $this->studentRepository->find($request->student_id);
        $point = $student->subjects()->where('subject_id', $request->subject_id)->first()->pivot->point;

        return response()->json($point);
    }

    public function ajaxAddPoint(AddPointStudentRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = [];
            $student = $this->studentRepository->find($request->student_id);
            foreach ($request->subject as $subject => $value) {
                $data[$value] = ['point' => $request->point[$subject]];
            }
            $student->subjects()->syncWithoutDetaching($data);
            DB::commit();

            return response()->json(['success' => 'Successfully added points of student.']);

        } catch (\Throwable $e) {
            DB::rollBack();

            return response()->json();
        }
    }

    public function listPointOneStudent($id)
    {
        $student = $this->studentRepository->find($id);
        if (!$student) {
            abort(404);
        }
        $data = $student->subjects()->paginate(Page::page);
        $subjects = $student->subjects()->wherePivot('point', null)->get();

        return view('students.point-student', ['data' => $data, 'student' => $student, 'id' => $id,
            'subjects' => $subjects]);
    }

    public function addPointStudent(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $student = $this->studentRepository->find($data['student_id']);

            $student->subjects()->updateExistingPivot($data['subject_id'], ['point' => $data['point']]);
            DB::commit();

            return redirect()->back()->with('add_point_success', 'Add success points');
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('add_point_false', 'Add failed points');
        }
    }
}
