<?php

namespace App\Services\Students;

use App\Enums\Page;
use App\Helpers\UploadImageHelper;
use App\Imports\PointImport;
use App\Repositories\Faculties\FacultyRepository;
use App\Repositories\Students\StudentRepository;
use App\Repositories\Subjects\SubjectRepository;
use App\Repositories\Users\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class StudentService
{
    protected $studentRepository, $userRepository, $facultyRepository, $subjectRepository;

    public function __construct(StudentRepository $studentRepository, UserRepository $userRepository,
                                FacultyRepository $facultyRepository,
                                SubjectRepository $subjectRepository)
    {
        $this->studentRepository = $studentRepository;
        $this->userRepository = $userRepository;
        $this->facultyRepository = $facultyRepository;
        $this->subjectRepository = $subjectRepository;
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

        return view('students.create_update', ['faculties' => $faculties]);
    }


    public function storeStudent($request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            if ($request->hasFile('avatar')) {
                $data['avatar'] = UploadImageHelper::uploadImage($request, 'avatar', 'students');
            }

            if ($user = $this->userRepository->create($data)) {
                $data['user_id'] = $user->id;
                $user->role()->create($data);
                $user->student()->create($data);
                dispatch(new \App\Jobs\SendMailRegister($data));
            }

            DB::commit();

            if ($request->ajax()) {
                return response()->json(['success' => 'Successfully added student.']);
            }

            return redirect()->route('students.index')->with('success',
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
        $faculties = $this->facultyRepository->getAll();

        if (!$student) {
            abort(404);
        }

        return view('students.create_update', ['student' => $student, 'faculties' => $faculties, 'id' => $id]);
    }

    public function updateStudent($request, $id)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $student = $this->studentRepository->find($id);

            if ($request->hasFile('avatar')) {
                UploadImageHelper::deleteImage($student,'students');
                $data['avatar'] = UploadImageHelper::uploadImage($request, 'avatar', 'students');
            }
            if ($user = $this->userRepository->update($student->user_id, $data)) {
                $user->role->update($data);
                $user->student->update($data);
            }
            DB::commit();

            return redirect()->route('students.index')->with('success',
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
                UploadImageHelper::deleteImage($student, 'students');

                if ($student->user) {
                    $student->user->delete();
                    $student->user->role->delete();
                    $student->delete();
                }
                DB::commit();

                return redirect()->route('students.index')->with('success',
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

    public function updateProfile($request, $id)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $student = $this->studentRepository->find($id);

            if ($request->hasFile('avatar')) {
                UploadImageHelper::deleteImage($student,'students');
                $data['avatar'] = UploadImageHelper::uploadImage($request, 'avatar', 'students');
            }

            $this->studentRepository->update($id, $data);
            DB::commit();

            return redirect()->back()->with('success', 'Successfully update student');
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('errors', 'Update student failed');
        }
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

            return redirect()->route('subjects.index');
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
                $attr[] = $subject->name;
            }
        }

        $mail = dispatch(new \App\Jobs\SendMailNotificationSubject($student->user->email, $attr));

        if ($mail) {

            return redirect()->back()->with('success', 'Successful notification sent');
        } else {

            return redirect()->back()->with('errors', 'Send notification failed');
        }

    }

    public function importPoints($request)
    {
        DB::beginTransaction();
        try {
            $studentRepository = new StudentRepository();
            $file = $request->file('excel_file');
            Excel::import(new PointImport($studentRepository), $file);
            DB::commit();

            return redirect()->route('students.index')->with('success', 'Successfully import student');

        } catch (\Throwable $e) {
            DB::rollBack();

            return redirect()->back()->with('errors', 'Import student failed');
        }
    }

    public function getAllSubject($id)
    {
        $student = $this->studentRepository->find($id);
        if (!$student) {
            abort(404);
        }
        $data = $student->subjects()->paginate(Page::page);
        $subjects = $student->subjects()->wherePivot('point', null)->get();

        return view('students.list_subject', ['data' => $data, 'student' => $student, 'id' => $id,
            'subjects' => $subjects]);
    }

    public function addPointSingle($request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $student = $this->studentRepository->find($data['student_id']);
            $student->subjects()->updateExistingPivot($data['subject_id'], ['point' => $data['point']]);
            DB::commit();

            return redirect()->back()->with('success', 'Add points success');
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('errors', 'Add points failed');
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

        return view('students.points', ['student' => $student, 'id' => $id,
            'subjectsNotPoint' => $subjectsNotPoint, 'subjectsWithPoint' => $subjectsWithPoint]);
    }

    public function getPointAjax(Request $request)
    {
        $student = $this->studentRepository->find($request->student_id);
        $point = $student->subjects()->where('subject_id', $request->subject_id)->first()->pivot->point;

        return response()->json($point);
    }

    public function addPointAjax($request, $id)
    {
        DB::beginTransaction();
        try {
            $data = [];
            $student = $this->studentRepository->find($id);
            $subjects = $request->subject ?: [];
            $points = $request->point ?: [];

            foreach ($student->subjects as $subject) {
                if (in_array($subject->id, $subjects)) {
                    $point = array_shift($points);
                    $data[$subject->id] = ['point' => $point];
                } else {
                    $data[$subject->id] = ['point' => null];
                }
            }

//            foreach ($request->subject as $subject => $value) {
//                $data[$value] = ['point' => $request->point[$subject]];
//            }
//            $student->subjects()->sync($data);

            $student->subjects()->syncWithoutDetaching($data);
            DB::commit();

            return redirect('students/list-subject-of-student/' . $id)->with('success', 'Add points success');

        } catch (\Throwable $e) {
            DB::rollBack();

            return redirect()->back();
        }
    }
}
