<?php

namespace App\Interfaces;

interface BookReadInterface
{
 public function getAllBooks();

 public function getBookById($id);
}
