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

        $students = $this->model
            ->with(['faculty.subjects', 'subjects', 'user'])
            ->when($toAge != null, function ($query) use ($dateFrom) {
                return $query->where('birthday', '>', $dateFrom);
            })
            ->when($fromAge != null, function ($query) use ($dateTo) {
                return $query->where('birthday', '<', $dateTo);
            })->orderBy('id', 'desc')->paginate(Page::page)->withQueryString();

        if ($pointTo != null || $pointFrom != null) {
                $students = $this->model
                ->with(['faculty.subjects', 'subjects', 'user'])
                ->select('students.*')
                ->selectRaw('AVG(student_subject.point) as average')
                ->leftJoin('student_subject', 'students.id', '=', 'student_subject.student_id')
                ->groupBy('students.id')
                ->whereHas('subjects', function ($query) {
                    $query->whereNotNull('point');
                })
                ->withCount('subjects as student_subject_count')
                ->havingRaw('student_subject_count = (SELECT COUNT(*) FROM subjects
                WHERE faculty_id = students.faculty_id AND deleted_at IS NULL)')
                ->when($pointTo, function ($query) use ($pointTo) {
                    $query->having('average', '<', $pointTo);
                })
                ->when($pointFrom, function ($query) use ($pointFrom) {
                    $query->having('average', '>', $pointFrom);
                })->orderBy('id', 'desc')->paginate(Page::page)->withQueryString();
        }

        return $students;
    }
}
