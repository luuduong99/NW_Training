<?php

namespace App\Services\Students;

use App\Http\Requests\Students\CreateStudentRequest;
use App\Http\Requests\Students\UpdateStudentRequest;
use App\Models\Faculty;
use App\Models\Role;
use App\Models\StudentSubject;
use App\Models\Subject;
use App\Repositories\Faculties\FacultyRepository;
use App\Repositories\Students\StudentRepository;
use App\Repositories\StudentSubject\StudentSubjectRepository;
use App\Repositories\Subjects\SubjectRepository;
use App\Repositories\Users\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class StudentService
{
    protected $studentRepository, $userRepository, $facultyRepository, $studentSubjectRepository, $subjectRepository;

    public function __construct(StudentRepository        $studentRepository, UserRepository $userRepository,
                                FacultyRepository        $facultyRepository,
                                StudentSubjectRepository $studentSubjectRepository,
                                SubjectRepository        $subjectRepository)
    {
        $this->studentRepository = $studentRepository;
        $this->userRepository = $userRepository;
        $this->facultyRepository = $facultyRepository;
        $this->studentSubjectRepository = $studentSubjectRepository;
        $this->subjectRepository = $subjectRepository;
    }

    public function getAllStudent(Request $request)
    {
        $dateFrom = Carbon::now()->subYears($request->fromOld)->startOfDay();
        $dateTo = Carbon::now()->subYears($request->toOld)->endOfDay();
        $faculties = Faculty::all();

        if (!$request->fromOld && $request->toOld) {
            $students = $this->studentRepository->toOld($dateTo);

            return view('students.index', ['students' => $students, 'faculties' => $faculties]);
        } elseif ($request->fromOld && $request->toOld) {
            $students = $this->studentRepository->fromToOld($dateFrom, $dateTo);

            return view('students.index', ['students' => $students, 'faculties' => $faculties]);
        } elseif ($request->fromOld && !$request->toOld) {
            $students = $this->studentRepository->fromOld($dateFrom);

            return view('students.index', ['students' => $students, 'faculties' => $faculties]);
        } else {
            $students = $this->studentRepository->getAllStudent();

            return view('students.index', ['students' => $students, 'faculties' => $faculties]);
        }
    }

    public function createStudent()
    {
        $faculties = $this->facultyRepository->getAllFaculties();

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

            $user = [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make('123456'),
            ];

            if ($result = $this->userRepository->createUser($user)) {
                Role::create([
                    'user_id' => $result->id,
                    'role' => $data['role'],
                ]);
                $this->studentRepository->createStudent([
                    'user_id' => $result->id,
                    'avatar' => $data['avatar'],
                    'phone' => $data['phone'],
                    'address' => $data['address'],
                    'gender' => $data['gender'],
                    'birthday' => $data['birthday'],
                    'faculty_id' => $data['faculty_id']
                ]);

                dispatch(new \App\Jobs\SendMail($data));
            }
            DB::commit();

            return redirect()->route('edu.students.list_students')->with('add_student',
                'Successfully added student');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
        }
    }

    public function editStudent($id)
    {
        $student = $this->studentRepository->find($id);
        $faculties = $this->facultyRepository->getAllFaculties();

        return view('students.update', ['student' => $student, 'faculties' => $faculties]);
    }

    public function updateStudent($id, UpdateStudentRequest $request)
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

            $user = [
                'name' => $data['name'],
            ];

            if ($this->userRepository->updateUser($student->user_id, $user)) {
                Role::create([
                    'user_id' => $student->user_id,
                    'role' => $data['role'],
                ]);

                $this->studentRepository->updateStudent($id, [
                    'avatar' => $data['avatar'],
                    'phone' => $data['phone'],
                    'address' => $data['address'],
                    'gender' => $data['gender'],
                    'birthday' => $data['birthday'],
                    'faculty_id' => $data['faculty_id']
                ]);
            }
            DB::commit();

            return redirect()->route('edu.students.list_students')->with('update_student',
                'Successfully update student');
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }

    public function deleteStudent($id, Request $request)
    {
        $student = $this->studentRepository->find($id);

        if (
            isset($student->avatar) && file_exists('images/students/' . $student->avatar)
            && $student->avatar != ""
        ) {
            unlink('images/students/' . $student->avatar);
        }

        if ($student->user) {
            $this->userRepository->deleteUser($student->user->id);
            Role::where('user_id', $student->user->id)->delete();
        }

        $this->studentRepository->deleteStudent($id);

        return redirect()->route('edu.students.list_students')->with('delete_student',
            'Successfully delete student');
    }

    public function profile($id)
    {
        $student = $this->studentRepository->find($id);

        return view('students.profile', ['student' => $student]);
    }

    public function registerMultipleSubject(Request $request)
    {
        $subjects = $request->subject_id;
        $student_id = Auth::user()->student->id;
        $faculty_id = Auth::user()->student->faculty_id;

        foreach ($subjects as $subject) {
            $this->studentSubjectRepository->createStudentSubject([
                'student_id' => $student_id,
                'faculty_id' => $faculty_id,
                'subject_id' => $subject

            ]);
        }

        return redirect()->route('edu.subjects.list_subjects');
    }

    public function notification(Request $request, $id)
    {
//        dd($request->all());
        $attr = [];
        $student = $this->studentRepository->findStudentId($id);
        $data = $student->subjects->pluck('id')->toArray();
        $subjects = Subject::where('faculty_id', $student->faculty_id)->get();

        foreach ($subjects as $subject) {
            if (!in_array($subject->id, $data)) {
                array_push($attr, $subject->name);
            }
        }
        dd($attr);
//        dd($subjects);
//        count($student->subjects->pluck('id')->toArray())
//        count($faculty->subjects->pluck('id')->toArray()))
//        dd(count($student->subjects->pluck('id')->toArray()));
    }
}
