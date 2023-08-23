<?php

namespace App\Imports;

use App\Models\StudentSubject;
use App\Repositories\Students\StudentRepository;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PointImport implements ToModel, WithHeadingRow
{
    protected $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function model(array $array)
    {
        try {
            $student = $this->studentRepository->find($array['student_id']);

            $student->subjects()->syncWithoutDetaching([
                $array['subject_id'] => ['point' => $array['point']]
            ]);
        } catch (\Throwable $e) {
            dd($array, $e);
        }
    }
}
