<?php

namespace App\Repositories;

use App\Models\User;

class UserRepo
{
    public function getById($id)
    {
        return $user = User::where('id', $id)->first();
    }
}