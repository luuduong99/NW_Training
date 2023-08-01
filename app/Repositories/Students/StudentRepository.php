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

    public function toOld($dateTo)
    {
        return Student::where('birthday', '>', $dateTo)
            ->orderBy('id', 'desc')
            ->paginate(5)->withQueryString();
    }

    public function fromToOld($dateFrom, $dataTo)
    {
        return Student::where('birthday', '<', $dateFrom)
            ->where('birthday', '>', $dataTo)
            ->orderBy('id', 'desc')
            ->paginate(5)->withQueryString();
    }

    public function fromOld($dataFrom)
    {
        return Student::where('birthday', '<', $dataFrom)
            ->orderBy('id', 'desc')
            ->paginate(5)->withQueryString();
    }
}
