<?php

namespace App\Services;

use App\Interfaces\AuthorWriteInterface;

class AuthorWriteService
{


    private AuthorWriteInterface $authorWriteRepository;

    public function __construct(AuthorWriteInterface $authorWriteRepository){


        $this->authorWriteRepository = $authorWriteRepository;
    }

    public function createAuthor($data){

        $dataArray = [
            'name' => $data['name'],
        ];

        return $this->authorWriteRepository->createAuthor($dataArray);
    }

    public function updateAuthor($data){

        $id = $data["user_id"];

        $fieldsToUpdate = [
            'name' => $data['name'] ?? null,
        ];

        $filteredFields = array_filter($fieldsToUpdate, fn($value) => $value !== null);

        return $this->authorWriteRepository->updateAuthor($id, $filteredFields);
    }

    public function deleteAuthor($id){
        return $this->authorWriteRepository->deleteAuthor($id);
    }

}
