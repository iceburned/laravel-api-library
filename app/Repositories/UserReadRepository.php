<?php

namespace App\Repositories;

use App\Interfaces\UserReadInterface;
use App\Models\User;

class UserReadRepository implements UserReadInterface
{
    public function getAllUsers()
    {
        return User::all();
    }

    public function getUserById($id)
    {
        return User::find($id);
    }

    public function GetUserBooks($id)
    {
        $ads =User::where('id', $id)->first();
    }
}
