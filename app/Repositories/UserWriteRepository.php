<?php

namespace App\Repositories;

use App\Interfaces\UserWriteInterface;
use App\Models\User;

class UserWriteRepository implements UserWriteInterface
{

    public function createUser($data)
    {
        return User::create($data);
    }

    public function updateUser($id, $data)
    {
        $user = User::find($id);

        if ($user){
            $user->update($data);

            return $user;
        }

        return null;
    }

    public function deleteUser($id)
    {
        $user = User::find($id);

        if ($user){
            $user->delete();

            return true;
        }

        return false;
    }
}
