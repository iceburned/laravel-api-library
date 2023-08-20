<?php

namespace App\Interfaces;

interface AuthorWriteInterface
{
    public function createAuthor($data);

    public function updateAuthor($id, $data);

    public function deleteAuthor($id);
}
