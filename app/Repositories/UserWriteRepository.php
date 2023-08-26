<?php

namespace App\Repositories;

use App\Interfaces\UserWriteInterface;
use App\Models\Book;
use App\Models\User;
use Exception;

class UserWriteRepository implements UserWriteInterface
{

    public function createUser($data)
    {
        return User::create($data);
    }

    public function updateUser($id, $data)
    {
        $user = User::find($id);

        if ($user){
            $user->update($data);

            return $user;
        }

        return null;
    }

    public function deleteUser($id)
    {
        $user = User::find($id);

        if ($user){
            $user->delete();

            return true;
        }

        return false;
    }

    public function AssignBook($userId, $bookId)
    {
        $user = User::find($userId);
        $book = Book::find($bookId);

        if(!$user || !$book){
            throw new Exception("User or book were not validated!");
        }

        if ($user->books->contains($book)) {
             throw new Exception("The book is already assigned to the user.");
        }

        if ($book->users()->exists()) {
            throw new Exception("The book is already assigned to another user.");
        }

        $user->books()->attach($book);

        return "Book assigned successfully.";
    }
}
