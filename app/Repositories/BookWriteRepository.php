<?php

namespace App\Repositories;

use App\Interfaces\BookWriteInterface;
use App\Models\Book;

class BookWriteRepository implements BookWriteInterface
{

    public function createBook($data)
    {
        return Book::create($data);
    }

    public function updateBook($id, $data)
    {
        $book = Book::find($id);

        if($book){
            $book->update($data);

            return $book;
        }

        return null;
    }

    public function deleteBook($id): ?bool
    {
        $book = Book::find($id);

        if($book){
            $book->delete();

            return true;
        }

        return false;
    }
}
