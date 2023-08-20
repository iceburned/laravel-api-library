<?php

namespace App\Services;

use App\Interfaces\UserWriteInterface;

class UserWriteService
{
    private UserWriteInterface $userWriteRepository;

    public function __construct(UserWriteInterface $userWriteRepository){

        $this->userWriteRepository = $userWriteRepository;
    }

    public function createUser($data){

        return $this->userWriteRepository->createUser($data);
    }

    public function updateUser($id, $data){

        return $this->userWriteRepository->updateUser($id, $data);
    }

    public function deleteUser($id){

        return $this->userWriteRepository->deleteUser($id);
    }
}
