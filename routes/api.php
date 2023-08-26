<?php


use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/get-all-users', [UserController::class, "getAllUsers"]);
Route::post('/get-user-books', [UserController::class, "GetUserBooks"]);
Route::post('/assign-books', [UserController::class, "AssignBook"]);
Route::post('/get-user', [UserController::class, "getUser"]);
Route::post('/create-user', [UserController::class, "createUser"]);
Route::put('/update-user', [UserController::class, "updateUser"]);
Route::post('/delete-user', [UserController::class, "deleteUser"]);

Route::get('/get-all-authors', [AuthorController::class, "getAllAuthors"]);
Route::get('/get-author-books', [AuthorController::class, "getAuthorBooks"]);
Route::post('/get-author', [AuthorController::class, "getAuthor"]);
Route::post('/create-author', [AuthorController::class, "createAuthor"]);
Route::post('/update-author', [AuthorController::class, "updateAuthor"]);
Route::post('/delete-author', [AuthorController::class, "deleteAuthor"]);

Route::get('/get-all-books', [BookController::class, "getAllBooks"]);
Route::post('/get-book', [BookController::class, "getBook"]);
Route::post('/create-book', [BookController::class, "createBook"]);
Route::post('/update-book', [BookController::class, "updateBook"]);
Route::post('/delete-book', [BookController::class, "deleteBook"]);

