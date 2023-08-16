<?php

namespace App\Repositories\Students;

use App\Enums\Page;
use App\Models\Student;
use App\Repositories\BaseRepository;
use Carbon\Carbon;

class StudentRepository extends BaseRepository
{
    public function getModel()
    {
        return Student::class;
    }

    public function filter($attribute = [])
    {
        $fromAge = isset($attribute['fromAge']) ? $attribute['fromAge'] : null;
        $toAge = isset($attribute['toAge']) ? $attribute['toAge'] : null;
        $pointTo = isset($attribute['toPoint']) ? $attribute['toPoint'] : null;
        $pointFrom = isset($attribute['fromPoint']) ? $attribute['fromPoint'] : null;

        $dateFrom = Carbon::now()->subYears($fromAge)->startOfDay();
        $dateTo = Carbon::now()->subYears($toAge + 1)->endOfDay();

        return Student::with('faculty.subjects', 'subjects', 'user')->when($toAge, function ($query) use ($dateTo) {
            return $query->where('birthday', '>', $dateTo);
        })
            ->when($fromAge, function ($query) use ($dateFrom) {
                return $query->where('birthday', '<', $dateFrom);
            })
            ->when($pointTo, function ($query) use ($pointTo) {
                return $query->where('average_point', '<', $pointTo);
            })
            ->when($pointFrom, function ($query) use ($pointFrom) {
                return $query->where('average_point', '>', $pointFrom);
            })
            ->orderBy('id', 'desc')
            ->paginate(Page::page)->withQueryString();
    }
}
