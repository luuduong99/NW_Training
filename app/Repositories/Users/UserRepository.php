<?php

namespace App\Repositories\Users;

use App\Models\User;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository
{
    public function getModel()
    {
        return User::class;
    }
}
