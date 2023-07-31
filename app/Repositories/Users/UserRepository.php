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

    public function getAllUsers()
    {
        return $this->getAll();
    }

    public function findUserId($id)
    {
        return $this->find($id);
    }

    public function createUser($attributes = [])
    {
        return $this->create($attributes);
    }

    public function updateUser($id, $attributes = [])
    {
        return parent::update($id, $attributes);
    }

    public function deleteUser($id)
    {
        return parent::delete($id);
    }
}
