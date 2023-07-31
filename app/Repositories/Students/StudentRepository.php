<?php

namespace App\Repositories\Students;

use App\Models\Student;
use App\Repositories\BaseRepository;

class StudentRepository extends BaseRepository
{
    public function getModel()
    {
        return Student::class;
    }

    public function getAllStudent()
    {
        return $this->getAll();
    }

    public function findStudentId($id)
    {
        return $this->find($id);
    }

    public function createStudent($attributes = [])
    {
        return $this->create($attributes);
    }

    public function updateStudent($id, $attributes = [])
    {
        return parent::update($id, $attributes);
    }

    public function deleteStudent($id)
    {
        return parent::delete($id);
    }
}