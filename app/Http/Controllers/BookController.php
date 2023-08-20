<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBookRequest;
use App\Http\Requests\DeleteBookRequest;
use App\Http\Requests\GetBookRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\BookReadService;
use App\Services\BookWriteService;
use Exception;


class BookController extends Controller
{
    private BookReadService $bookReadService;
    private BookWriteService $bookWriteService;

    public  function __construct(BookReadService $bookReadService, BookWriteService $bookWriteService)
    {

        $this->bookReadService = $bookReadService;
        $this->bookWriteService = $bookWriteService;
    }

    public function getAllBooks()
    {
        $books = $this->bookReadService->getAllBooks();

        return response()->json($books);
    }

    public function getBook(GetBookRequest $request)
    {
        $book = $this->bookReadService->getUserById($request->book_id);

        return response()->json($book);
    }

    public function createBook(CreateBookRequest $request)
    {

        $dataArray = $request->all();

        try {
            $book = $this->bookWriteService->createBook($dataArray);
        } catch (Exception $e) {
            //TODO: Logging
        }

        return response('Book created!', '201');
    }

    public function updateBook(UpdateUserRequest $request)
    {

        $dataArray = $request->all();

        try {
            $book = $this->bookWriteService->updateBook($dataArray);
        } catch (Exception $e) {
            //TODO: Logging
        }

        return response()->json($book);
    }

    public function deleteBook(DeleteBookRequest $request)
    {
        try {
            $book = $this->bookWriteService->deleteBook($request->book_id);
        } catch (Exception $e) {
            //TODO: Logging
        }

        return response('Book deleted!');
    }
}
