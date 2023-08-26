<?php

namespace App\Interfaces;

interface UserReadInterface
{
    public function getAllUsers();

    public function getUserById($id);

    public function GetUserBooks($id);
}
