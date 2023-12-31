<?php

namespace App\Interfaces;

interface AuthorReadInterface
{
    public function getAllAuthors();

    public function getAuthorById($id);

    public function getAuthorBooks($id);
}
