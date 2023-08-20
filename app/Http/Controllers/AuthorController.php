<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAuthorRequest;
use App\Http\Requests\DeleteAuthorRequest;
use App\Http\Requests\GetAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Services\AuthorReadService;
use App\Services\AuthorWriteService;
use Exception;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    private AuthorReadService $authorReadService;
    private AuthorWriteService $authorWriteService;

    public function __construct(AuthorReadService $authorReadService, AuthorWriteService $authorWriteService)
    {

        $this->authorReadService = $authorReadService;
        $this->authorWriteService = $authorWriteService;
    }

    public function getAllAuthors()
    {
        $authors = $this->authorReadService->getAllAuthors();

        return response()->json($authors);
    }

    public function getAuthor(GetAuthorRequest $request){
        $author = $this->authorReadService->getAuthorById($request->author_id);

        return response()->json($author);
    }

    public function createAuthor(CreateAuthorRequest $request)
    {
        $dataArray = $request->all();

        try {
        $author = $this->authorWriteService->createAuthor($dataArray);
        } catch (Exception $e) {
            //TODO: Logging
        }

        return response('Author created!', '201');
    }

    public function updateAuthor(UpdateAuthorRequest $request)
    {
        try {
        $author = $this->authorWriteService->updateAuthor($request->name);

        } catch (Exception $e) {
            //TODO: Logging
        }

        return response()->json($author);
    }

    public function deleteAuthor(DeleteAuthorRequest $request)
    {
        try {
            $author = $this->authorWriteService->deleteAuthor($request->author_id);
        } catch (Exception $e) {
            //TODO: Logging
        }
        return response('Author deleted!');
    }
}
