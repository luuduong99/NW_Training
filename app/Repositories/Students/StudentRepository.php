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

    public function filter($attribute = [])
    {
        return Student::when($attribute['toAge'], function ($query) use ($attribute) {
            return $query->where('birthday', '>', $attribute['dateTo']);
        })
            ->when($attribute['fromAge'], function ($query) use ($attribute) {
                return $query->where('birthday', '<', $attribute['dateFrom']);
            })
            ->when($attribute['pointTo'], function ($query) use ($attribute) {
                return $query->where('average_point', '<', $attribute['pointTo']);
            })
            ->when($attribute['pointFrom'], function ($query) use ($attribute) {
                return $query->where('average_point', '>', $attribute['pointFrom']);
            })
            ->orderBy('id', 'desc')
            ->paginate(5)->withQueryString();
    }
}
