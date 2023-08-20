<?php

namespace App\Services;

use App\Interfaces\BookWriteInterface;

class BookWriteService
{
    private BookWriteInterface $bookWriteRepository;

    public function __construct(BookWriteInterface $bookWriteRepository)
    {
        $this->bookWriteRepository = $bookWriteRepository;
    }

    public function createBook($data){

        $dataArray = [
            'name' => $data['name'],
            'author_id' => $data['author_id']
        ];

        return $this->bookWriteRepository->createBook($dataArray);
    }

    public function updateBook($data){

        $id = $data["book_id"];

        $fieldsToUpdate = [
            'name' => $data['name'] ?? null,

        ];

        $filteredFields = array_filter($fieldsToUpdate, fn($value) => $value !== null);

        return $this->bookWriteRepository->updateBook($id, $filteredFields);
    }

    public function deleteBook($id){

        return $this->bookWriteRepository->deleteBook($id);
    }
}
