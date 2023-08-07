<?php

namespace App\Imports;

use App\Models\StudentSubject;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PointImport implements ToModel, WithHeadingRow
{
    public function model(array $array)
    {
        $studentId = $array['student_id'];
        $subjectId = $array['subject_id'];
        $facultyId = $array['faculty_id'];
        $point = $array['point'];

        $studentPoint = StudentSubject::updateOrCreate([
            'student_id' => $studentId,
            'subject_id' =>  $subjectId,
            'faculty_id' => $facultyId,
        ],
        [
            'point' =>  $point
        ]);
    }
}
