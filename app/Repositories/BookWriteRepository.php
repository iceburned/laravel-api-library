<?php

namespace App\Repositories;

use App\Interfaces\BookWriteInterface;
use App\Models\Book;
use App\Models\Authors;



class BookWriteRepository implements BookWriteInterface
{

    public function createBook($data)
    {
        $author = Authors::find($data["author_id"]);

        $book = Book::create(['title' => $data['name']]);

        $author->books()->sync($book);

        return $book;
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
