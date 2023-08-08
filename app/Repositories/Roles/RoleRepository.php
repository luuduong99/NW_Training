<?php

namespace App\Repositories\Roles;

use App\Models\Role;
use App\Repositories\BaseRepository;

class RoleRepository extends BaseRepository
{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return Role::class;
    }
}
