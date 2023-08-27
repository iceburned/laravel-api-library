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
            'title' => $data['title'],
            'author_id' => $data['author_id']
        ];

        return $this->bookWriteRepository->createBook($dataArray);
    }

    public function updateBook($data){

        $id = $data["book_id"];

        $fieldsToUpdate = [
            'title' => $data['title'],
        ];

        $filteredFields = array_filter($fieldsToUpdate, fn($value) => $value !== null);

        return $this->bookWriteRepository->updateBook($id, $filteredFields);
    }

    public function deleteBook($data){

        return $this->bookWriteRepository->deleteBook($data);
    }
}
