<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAuthorRequest;
use App\Http\Requests\DeleteAuthorRequest;
use App\Http\Requests\GetAuthorBooksRequest;
use App\Http\Requests\GetAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Services\AuthorReadService;
use App\Services\AuthorWriteService;
use Exception;
use Illuminate\Support\Facades\Log;

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

    public function getAuthor(GetAuthorRequest $request)
    {
        $author = $this->authorReadService->getAuthorById($request->author_id);

        return response()->json($author);
    }

    public function getAuthorBooks(GetAuthorBooksRequest $request)
    {
        try {
            $books = $this->authorReadService->getAuthorBooks($request->author_id);

            return response()->json($books);
        }catch (Exception $e){
            Log::error('Did not get author books!:' . $e->getMessage());

            return response()->json([
                'message' => 'Did not get author books!',
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function createAuthor(CreateAuthorRequest $request)
    {
        $dataArray = $request->all();

        try {
            $author = $this->authorWriteService->createAuthor($dataArray);

            return response('Author created!', '201');
        } catch (Exception $e) {
            Log::error('Author creation failed!:' . $e->getMessage());

            return response()->json([
                'message' => 'Author creation failed!',
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function updateAuthor(UpdateAuthorRequest $request)
    {
        try {
            $author = $this->authorWriteService->updateAuthor($request->name);

            return response()->json($author);
        } catch (Exception $e) {
            Log::error('Update author failed:' . $e->getMessage());

            return response()->json([
                'message' => 'Author was not updated',
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function deleteAuthor(DeleteAuthorRequest $request)
    {
        try {
            $author = $this->authorWriteService->deleteAuthor($request->author_id);

            return response('Author deleted!');
        } catch (Exception $e) {
            Log::error('Deletion author failed:' . $e->getMessage());

            return response()->json([
                'message' => 'Author was not deleted',
                'error' => $e->getMessage(),
            ]);
        }
    }
}
