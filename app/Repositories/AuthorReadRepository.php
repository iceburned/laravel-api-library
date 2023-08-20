<?php

namespace App\Repositories;

use App\Interfaces\AuthorReadInterface;
use App\Models\Authors;
use PharIo\Manifest\Author;

class AuthorReadRepository implements AuthorReadInterface
{

    public function getAllAuthors()
    {
        return Authors::all();
    }

    public function getAuthorById($id)
    {
        return Authors::find($id);
    }
}
