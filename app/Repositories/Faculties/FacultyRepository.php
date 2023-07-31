<?php

namespace App\Repositories\Faculties;

use App\Models\Faculty;
use App\Repositories\BaseRepository;

class FacultyRepository extends BaseRepository
{
    public function getModel()
    {
        return Faculty::class;
    }

    public function getAllFaculties()
    {
        return $this->getAll();
    }

    public function findFacultyId($id)
    {
        return $this->find($id);
    }

    public function createFaculty($attributes = [])
    {
        return $this->create($attributes);
    }

    public function updateFaculty($id, $attributes = [])
    {
        return parent::update($id, $attributes);
    }

    public function deleteFaculty($id)
    {
        return parent::delete($id);
    }
}
