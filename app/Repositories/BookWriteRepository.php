<?php

namespace App\Repositories;

use App\Interfaces\BookWriteInterface;
use App\Models\Book;
use App\Models\Author;
use Exception;

class BookWriteRepository implements BookWriteInterface
{

    public function createBook($data)
    {
        $author = Author::find($data["author_id"]);

        if(!$author) throw new Exception("Author cannot be found");

        return $author->books()->create(['title' => $data['title']]);
    }

    public function updateBook($id, $data)
    {
        $book = Book::find($id);

        if($book){
            $book->update($data);

            return $book;
        }

        throw new Exception("Book cannot be found");
    }

    public function deleteBook($data)
    {
        $author = Author::find($data["author_id"]);
        $book = Book::find($data["book_id"]);

        if(!$author) throw new Exception("Author cannot be found");
        if(!$book) throw new Exception("Book cannot be found");

        $author->books()->detach($book);
        $book->delete();

        return true;
    }
}
