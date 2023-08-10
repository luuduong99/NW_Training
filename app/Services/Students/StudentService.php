<?php

namespace App\Services\Students;

use App\Http\Requests\Students\CreateStudentRequest;
use App\Http\Requests\Students\UpdateStudentRequest;
use App\Imports\PointImport;
use App\Models\Subject;
use App\Repositories\Faculties\FacultyRepository;
use App\Repositories\Roles\RoleRepository;
use App\Repositories\Students\StudentRepository;
use App\Repositories\StudentSubject\StudentSubjectRepository;
use App\Repositories\Subjects\SubjectRepository;
use App\Repositories\Users\UserRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;


class StudentService
{
    protected $studentRepository, $userRepository, $facultyRepository, $studentSubjectRepository, $subjectRepository,
        $roleRepository;

    public function __construct(StudentRepository        $studentRepository, UserRepository $userRepository,
                                FacultyRepository        $facultyRepository,
                                StudentSubjectRepository $studentSubjectRepository,
                                SubjectRepository        $subjectRepository, RoleRepository $roleRepository)
    {
        $this->studentRepository = $studentRepository;
        $this->userRepository = $userRepository;
        $this->facultyRepository = $facultyRepository;
        $this->studentSubjectRepository = $studentSubjectRepository;
        $this->subjectRepository = $subjectRepository;
        $this->roleRepository = $roleRepository;
    }

    public function getAllStudent(Request $request)
    {
        $dateFrom = Carbon::now()->subYears($request->fromAge)->startOfDay();
        $dateTo = Carbon::now()->subYears($request->toAge)->endOfDay();
        $faculties = $this->facultyRepository->getAll();

        $students = $this->studentRepository->filter([
            'fromAge' => $request->fromAge,
            'toAge' => $request->toAge,
            'dateFrom' => $dateFrom,
            'dateTo' => $dateTo,
            'pointTo' => $request->toPoint,
            'pointFrom' => $request->fromPoint
        ]);

        return view('students.index', ['students' => $students, 'faculties' => $faculties]);
    }

    public function createStudent()
    {
        $faculties = $this->facultyRepository->getAll();

        return view('students.create', ['faculties' => $faculties]);
    }


    public function storeStudent(CreateStudentRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();

            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $ext = strtolower($file->getClientOriginalExtension());
                $fileName = rand() . '.' . $ext;
                $file->move('images/students', $fileName);
                $image = $fileName;
            }

            if ($request->hasFile('avatar')) {
                $data['avatar'] = $image;
            } else {
                $data['avatar'] = null;
            }

            if ($result = $this->userRepository->create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make('123456'),
            ])) {
                $this->roleRepository->create([
                    'user_id' => $result->id,
                    'role' => $data['role'],
                ]);

                $this->studentRepository->create([
                    'user_id' => $result->id,
                    'avatar' => $data['avatar'],
                    'phone' => $data['phone'],
                    'address' => $data['address'],
                    'gender' => $data['gender'],
                    'birthday' => $data['birthday'],
                    'faculty_id' => $data['faculty_id']
                ]);

                dispatch(new \App\Jobs\SendMailRegister($data));
            }
            DB::commit();

            if($request->ajax()){
                return response()->json(['success' => 'Successfully added student.']);
            } else {
                return redirect()->route('edu.students.index')->with('add_student',
                    'Successfully added student.');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            if($request->ajax()){
                return response()->json();
            }
        }
    }

    public function editStudent($id)
    {
        $student = $this->studentRepository->find($id);
        $faculties = $this->facultyRepository->getAll();

        return view('students.update', ['student' => $student, 'faculties' => $faculties]);
    }

    public function updateStudent(UpdateStudentRequest $request, $id)
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
                $fileName = rand() . '.' . $ext;
                $file->move('images/students', $fileName);
                $image = $fileName;
            }

            if ($request->hasFile('avatar')) {
                $data['avatar'] = $image;
            } else {
                $data['avatar'] = $student->avatar;
            }

            if ($this->userRepository->update($student->user_id, ['name' => $data['name']])) {
                $this->roleRepository->update($student->user_id,[
                    'role' => $data['role']
                ]);
                $this->studentRepository->update($id, [
                    'avatar' => $data['avatar'],
                    'phone' => $data['phone'],
                    'address' => $data['address'],
                    'gender' => $data['gender'],
                    'birthday' => $data['birthday'],
                    'faculty_id' => $data['faculty_id']
                ]);
            }
            DB::commit();

            return redirect()->route('edu.students.index')->with('update_student',
                'Successfully update student');
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
                'Successfully delete student');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
        }
    }

    public function profile($id)
    {
        $student = $this->studentRepository->find($id);

        return view('students.profile', ['student' => $student]);
    }

    public function registerMultipleSubject(Request $request)
    {
        DB::beginTransaction();
        try {
            $subjects = $request->subject_id;
            $student_id = Auth::user()->student->id;
            $faculty_id = Auth::user()->student->faculty_id;

            foreach ($subjects as $subject) {
                $this->studentSubjectRepository->create([
                    'student_id' => $student_id,
                    'faculty_id' => $faculty_id,
                    'subject_id' => $subject,
                ]);
            }
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
        $data = $student->subjects->pluck('id')->toArray();
        $subjects = Subject::where('faculty_id', $student->faculty_id)->get();

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
            return redirect()->back()->with('import_false', 'Send notification failed');
        }
    }
}
