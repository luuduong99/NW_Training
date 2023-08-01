<?php

namespace App\Services\Students;

use App\Http\Requests\Students\CreateStudentRequest;
use App\Http\Requests\Students\UpdateStudentRequest;
use App\Repositories\Students\StudentRepository;
use App\Repositories\Users\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentService
{
    protected $studentRepository, $userRepository;

    public function __construct(StudentRepository $studentRepository, UserRepository $userRepository)
    {
        $this->studentRepository = $studentRepository;
        $this->userRepository = $userRepository;
    }

    public function getAllStudent()
    {
        $students = $this->studentRepository->getAllStudent();

        return view('students.index', ['students' => $students]);
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
                $student = [
                    'user_id' => $result->id,
                    'avatar' => $data['avatar'],
                    'phone' => $data['phone'],
                    'address' => $data['address'],
                    'gender' => $data['gender'],
                    'birthday' => $data['birthday']
                ];
                $this->studentRepository->createStudent($student);
            }

            DB::commit();

            return redirect()->route('edu.students.list_students');
        } catch (\Throwable $th) {
            DB::rollBack();
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
                $attr = [
                    'avatar' => $data['avatar'],
                    'phone' => $data['phone'],
                    'address' => $data['address'],
                    'gender' => $data['gender'],
                    'birthday' => $data['birthday']
                ];

                $this->studentRepository->updateStudent($id, $attr);
            }

            DB::commit();

            return redirect()->route('edu.students.list_students');
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
        }

        $this->studentRepository->deleteStudent($id);

        return redirect()->route('edu.students.list_students');
    }

    public function profile($id)
    {
        $student = $this->studentRepository->find($id);

        return view('students.profile', ['student' => $student]);
    }
}
