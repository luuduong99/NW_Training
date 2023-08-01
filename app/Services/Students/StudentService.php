<?php

namespace App\Services\Students;

use App\Http\Requests\Students\CreateStudentRequest;
use App\Http\Requests\Students\UpdateStudentRequest;
use App\Models\Role;
use App\Repositories\Students\StudentRepository;
use App\Repositories\Users\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class StudentService
{
    protected $studentRepository, $userRepository;

    public function __construct(StudentRepository $studentRepository, UserRepository $userRepository)
    {
        $this->studentRepository = $studentRepository;
        $this->userRepository = $userRepository;
    }

    public function getAllStudent(Request $request)
    {
        $dateFrom = Carbon::now()->subYears($request->fromOld)->startOfDay();
        $dateTo = Carbon::now()->subYears($request->toOld)->endOfDay();

        if (!$request->fromOld && $request->toOld) {
            $students = $this->studentRepository->toOld($dateTo);
            return view('students.index', ['students' => $students]);
        } elseif ($request->fromOld && $request->toOld) {
            $students = $this->studentRepository->fromToOld($dateFrom, $dateTo);
            return view('students.index', ['students' => $students]);
        } elseif ($request->fromOld && !$request->toOld) {
            $students = $this->studentRepository->fromOld($dateFrom);
            return view('students.index', ['students' => $students]);
        } else {
            $students = $this->studentRepository->getAllStudent();
            return view('students.index', ['students' => $students]);
        }

        // $students = $this->studentRepository->getAllStudent();

        // return view('students.index', ['students' => $students]);
    }

    public function createStudent()
    {
        return view('students.create');
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
                    'birthday' => $data['birthday']
                ]);

                dispatch(new \App\Jobs\SendMail($data));
            }
            DB::commit();

            return redirect()->route('edu.students.list_students')->with('add_student', 'Successfully added student');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
        }
    }

    public function editStudent($id)
    {
        $student = $this->studentRepository->find($id);

        return view('students.update', ['student' => $student]);
    }

    public function updateStudent($id, UpdateStudentRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();

            $student = $this->studentRepository->find($id);

            if ($request->hasFile('avatar')) {
                if (
                    isset($student->avatar) && file_exists('images/students/' . $student->avatar) && $student->avatar != ""
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
                    'birthday' => $data['birthday']
                ]);
            }
            DB::commit();

            return redirect()->route('edu.students.list_students')->with('update_student', 'Successfully update student');
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }

    public function deleteStudent($id, Request $request)
    {
        $student = $this->studentRepository->find($id);

        if (
            isset($student->avatar) && file_exists('images/students/' . $student->avatar) && $student->avatar != ""
        ) {
            unlink('images/students/' . $student->avatar);
        }

        if ($student->user) {
            $this->userRepository->deleteUser($student->user->id);
            Role::where('user_id', $student->user->id)->delete();
        }

        $this->studentRepository->deleteStudent($id);

        return redirect()->route('edu.students.list_students')->with('delete_student', 'Successfully delete student');
    }

    public function profile($id)
    {
        $student = $this->studentRepository->find($id);

        return view('students.profile', ['student' => $student]);
    }
}
