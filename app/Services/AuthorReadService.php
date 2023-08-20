<?php

namespace App\Services;

use App\Interfaces\AuthorReadInterface;
use App\Models\Authors;

class AuthorReadService
{
    private AuthorReadInterface $authorReadRepository;

    public function __construct(AuthorReadInterface $authorReadRepository)
    {
        $this->authorReadRepository = $authorReadRepository;
    }

    public function getAllAuthors(){

        return $this->authorReadRepository->getAllAuthors();
    }

    public function getAuthorById($id)
    {

        return $this->authorReadRepository->getAuthorById($id);
    }
}
