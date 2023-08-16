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

//    public function addSinglePoint($attribute = [])
//    {
//        $data = $this->getAll()->where('student_id', $attribute['student_id'])
//            ->where('subject_id', $attribute['subject_id'])
//            ->where('faculty_id', $attribute['faculty_id'])
//            ->first();
//        if($data) {
//            $data->update($attribute);
//        }
//    }

    public function multipleAddPointOneStudent($id, $attribute = [])
    {
        foreach ($attribute['subject'] as $key => $value) {
            $result = $this->getAll()->where('student_id', $id)
                ->where('subject_id', $value)
                ->first();
            if ($result) {
                $result->update([
                    'point' => $attribute['point'][$key],
                ]);
            }
        }
    }
}

