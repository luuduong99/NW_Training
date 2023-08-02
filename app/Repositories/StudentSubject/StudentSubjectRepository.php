<?php

namespace App\Repositories\StudentSubject;

use App\Models\StudentSubject;
use App\Repositories\BaseRepository;

class StudentSubjectRepository extends BaseRepository
{
    public function getModel()
    {
        return StudentSubject::class;
    }

    public function getAllPoint()
    {
        return $this->getAll();
    }

    public function createStudentSubject($attributes = [])
    {
        return $this->create($attributes);
    }

    public function pointStudent($attribute = [])
    {
        $data = StudentSubject::where('student_id', $attribute['student_id'])
            ->where('subject_id', $attribute['subject_id'])
            ->where('faculty_id', $attribute['faculty_id'])
            ->first();
        if($data) {
            $data->update($attribute);
        }
    }

    public function showPointStudent($id)
    {
        return StudentSubject::where('student_id', $id)->get();
    }
}

