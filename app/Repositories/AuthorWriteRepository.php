<?php

namespace App\Repositories;

use App\Interfaces\AuthorWriteInterface;
use App\Models\Author;
use Exception;


class AuthorWriteRepository implements AuthorWriteInterface
{

    public function createAuthor($data)
    {
        return Author::create($data);
    }

    public function updateAuthor($id, $data)
    {
        $author = Author::find($id);

        if ($author){
            $author->update($data);

            return $author;
        }

        return null;
    }

    public function deleteAuthor($id)
    {
        $author = Author::find($id);

        if ($author){
            $author->books()->detach();
            $author->delete();

//            event(new AuthorDeleted($author));
//            Event::dispatch(new AuthorDeleted($author));

            return response()->noContent();
        }

        throw new Exception("Author not found");
    }


}
