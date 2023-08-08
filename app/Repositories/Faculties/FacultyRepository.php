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
}
