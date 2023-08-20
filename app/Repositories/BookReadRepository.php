<?php

namespace App\Repositories;

use App\Interfaces\BookReadInterface;
use App\Models\Book;

class BookReadRepository implements BookReadInterface
{

    public function getAllBooks()
    {
        return Book::all();
    }

    public function getBookById($id)
    {
        return Book::find($id);
    }
}
