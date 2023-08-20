<?php

namespace App\Interfaces;

interface UserWriteInterface
{
    public function createUser($data);

    public function updateUser($id, $data);

    public function deleteUser($id);
}
