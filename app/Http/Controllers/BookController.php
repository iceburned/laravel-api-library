<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBookRequest;
use App\Http\Requests\DeleteBookRequest;
use App\Http\Requests\GetBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Services\BookReadService;
use App\Services\BookWriteService;
use Exception;
use Illuminate\Support\Facades\Log;


class BookController extends Controller
{
    private BookReadService $bookReadService;
    private BookWriteService $bookWriteService;

    public function __construct(BookReadService $bookReadService, BookWriteService $bookWriteService)
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
        $bookId = $request->book_id;
        $book = $this->bookReadService->getBookById($bookId);
        return response()->json($book);
    }

    public function createBook(CreateBookRequest $request)
    {
        $dataArray = $request->validated();

        try {
            $book = $this->bookWriteService->createBook($dataArray);
            return response()->json(['message' => 'Book created'], 201);

        } catch (Exception $e) {
            Log::error('Book creation failed: ' . $e->getMessage());

            return response()->json([
                'message' => 'Book not created',
                "error" => $e->getMessage(),
            ], 500);
        }
    }

    public function updateBook(UpdateBookRequest $request)
    {
        $validated = $request->validated();

        try {
            $book = $this->bookWriteService->updateBook($validated);
            return response()->json($book);
        } catch (Exception $e) {
            Log::error('Book update failed: ' . $e->getMessage());
            return response()->json(['message' => 'Book not updated'], 500);
        }
    }

    public function deleteBook(DeleteBookRequest $request)
    {
        $validated = $request->validated();

        try {
            $this->bookWriteService->deleteBook($validated);
            return response()->json(['message' => 'Book deleted']);
        } catch (Exception $e) {
            Log::error('Book deletion failed: ' . $e->getMessage());
            return response()->json(['message' => 'Book not deleted'], 500);
        }
    }
}
