<?php

namespace App\Services\Students;

use App\Http\Requests\Students\CreateStudentRequest;
use App\Repositories\Students\StudentRepository;
use App\Repositories\Users\UserRepository;
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

            if($result = $this->userRepository->createUser($user)){
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

}