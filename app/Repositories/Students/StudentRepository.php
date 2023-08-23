<?php

namespace App\Repositories\Students;

use App\Enums\Page;
use App\Models\Student;
use App\Repositories\BaseRepository;

class StudentRepository extends BaseRepository
{
    protected $model;

    public function getModel(): string
    {
        return Student::class;
    }

    public function filter($attribute = [])
    {
        $fromAge = isset($attribute['fromAge']) ? $attribute['fromAge'] : null;
        $toAge = isset($attribute['toAge']) ? $attribute['toAge'] : null;
        $pointTo = isset($attribute['toPoint']) ? $attribute['toPoint'] : null;
        $pointFrom = isset($attribute['fromPoint']) ? $attribute['fromPoint'] : null;
        $dateFrom = now()->subYears($toAge + 1)->toDateString();
        $dateTo = now()->subYears($fromAge)->toDateString();

        return $this->model
            ->with(['faculty.subjects', 'subjects', 'user'])
            ->select('students.*')
            ->when($pointTo != null || $pointFrom != null, function ($query) use ($pointTo, $pointFrom) {
                $query->selectRaw('AVG(student_subject.point) as average')
                    ->leftJoin('student_subject', 'students.id', '=', 'student_subject.student_id')
                    ->groupBy('students.id')
                    ->whereHas('subjects', function ($subQuery) {
                        $subQuery->whereNotNull('point');
                    })
                    ->withCount('subjects as student_subject_count')
                    ->havingRaw('student_subject_count = (SELECT COUNT(*) FROM subjects
                    WHERE faculty_id = students.faculty_id AND deleted_at IS NULL)')
                    ->when($pointTo != null, function ($avgQuery) use ($pointTo) {
                        $avgQuery->having('average', '<', $pointTo);
                    })
                    ->when($pointFrom != null, function ($avgQuery) use ($pointFrom) {
                        $avgQuery->having('average', '>', $pointFrom);
                    });
            })
            ->when($toAge != null, function ($query) use ($dateFrom) {
                $query->where('birthday', '>', $dateFrom);
            })
            ->when($fromAge != null, function ($query) use ($dateTo) {
                $query->where('birthday', '<', $dateTo);
            })
            ->orderBy('id', 'desc')
            ->paginate(Page::page)
            ->withQueryString();
    }
}
