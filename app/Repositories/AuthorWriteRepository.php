<?php

namespace App\Repositories;

use App\Interfaces\AuthorWriteInterface;
use App\Models\Authors;

class AuthorWriteRepository implements AuthorWriteInterface
{

    public function createAuthor($data)
    {
        return Authors::create($data);
    }

    public function updateAuthor($id, $data)
    {
        $author = Authors::find($id);

        if ($author){
            $author->update($data);

            return $author;
        }

        return null;
    }

    public function deleteAuthor($id)
    {
        $author = Authors::find($id);

        if ($author){
            $author->delete();

            return true;
        }

        return false;
    }
}
