<?php

namespace App\Repositories;

use App\Interfaces\AuthorReadInterface;
use App\Models\Author;
use Exception;

class AuthorReadRepository implements AuthorReadInterface
{

    public function getAllAuthors()
    {
        return Author::all();
    }

    public function getAuthorById($id)
    {
        return Author::find($id);
    }

    public function getAuthorBooks($id)
    {
        $author = Author::find($id);

        if (!$author) throw new Exception("Author not found");

        return $author->books()->get();
    }
}
