<?php

namespace App\Services;

use App\Interfaces\BookReadInterface;

class BookReadService
{
    private BookReadInterface $bookReadRepository;

    public function __construct(BookReadInterface $bookReadRepository)
    {

        $this->bookReadRepository = $bookReadRepository;
    }

    public function getAllBooks(){

        return $this->bookReadRepository->getAllBooks();
    }

    public function getBookById($id){

        return $this->bookReadRepository->getBookById($id);
    }
}
