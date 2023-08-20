<?php

namespace App\Interfaces;

interface BookWriteInterface
{
    public function createBook($data);

    public function updateBook($id, $data);

    public function deleteBook($id);
}
