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

        $dataArray = [
            'name' => $data['name'],
            "email" => $data['email'],
            "phone" => $data['phone'],
            "password" => $data['password'],
        ];

        return $this->userWriteRepository->createUser($dataArray);
    }

    public function updateUser($data){
        $id = $data["user_id"];

        $fieldsToUpdate = [
            'name' => $data['name'] ?? null,
            'email' => $data['email'] ?? null,
            'phone' => $data['phone'] ?? null,
            'password' => $data['password'] ?? null,
        ];

        $filteredFields = array_filter($fieldsToUpdate, fn($value) => $value !== null);

        return $this->userWriteRepository->updateUser($id, $filteredFields);
    }

    public function deleteUser($id){

        return $this->userWriteRepository->deleteUser($id);
    }

    public function assignBook($data)
    {
        $userId = $data["user_id"];
        $bookId = $data["book_id"];

        return $this->userWriteRepository->assignBook($userId, $bookId);
    }

    public function unAssignBook($data)
    {
        $userId = $data["user_id"];
        $bookId = $data["book_id"];

        return $this->userWriteRepository->unAssignBook($userId, $bookId);
    }
}
