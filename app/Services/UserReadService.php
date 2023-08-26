<?php

namespace App\Services;

use App\Interfaces\UserReadInterface;

class UserReadService
{
    private UserReadInterface $userReadRepository;

    public function __construct(UserReadInterface $userReadRepository){

        $this->userReadRepository = $userReadRepository;
    }

    public function getAllUsers(){

        return $this->userReadRepository->getAllUsers();
    }

    public function getUserById($id){

        return $this->userReadRepository->getUserById($id);
    }

    public function GetUserBooks($id)
    {
        return $this->userReadRepository->GetUserBooks($id);
    }
}
