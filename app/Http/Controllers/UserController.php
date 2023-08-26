<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignBookRequest;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\DeleteUserRequest;
use App\Http\Requests\GetUserBooksRequest;
use App\Http\Requests\GetUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\UserReadService;
use App\Services\UserWriteService;
use Exception;
use http\Env\Response;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
    private UserReadService $userReadService;
    private UserWriteService $userWriteService;

    public function __construct(UserReadService $userReadService, UserWriteService $userWriteService)
    {
        $this->userReadService = $userReadService;
        $this->userWriteService = $userWriteService;
    }

    public function getAllUsers()
    {
        $users = $this->userReadService->getAllUsers();

        return response()->json($users);
    }

    public function getUser(GetUserRequest $request)
    {
        $user = $this->userReadService->getUserById($request->user_id);

        return response()->json($user);
    }

    public function GetUserBooks(GetUserBooksRequest $request)
    {
        $validated = $request->validated();

        $books = $this->userReadService->GetUserBooks($validated['id']);

        return response()->json($books);
    }

    public function AssignBook(AssignBookRequest $request)
    {
        $validated = $request->validated();

        try {
            $book = $this->userWriteService->AssignBook($validated);

            return response()->json($book);
        }catch (Exception $e){
            Log::error("Book was not assigned:" . $e->getMessage());

            return response($e->getMessage(), 500);
        }
    }

    public function createUser(CreateUserRequest $request)
    {
        $dataArray = $request->all();

        try {
            $user = $this->userWriteService->createUser($dataArray);

            return response('User created!', '201');
        } catch (Exception $e) {
            Log::error("User was not created:" . $e->getMessage());
        }
    }

    public function updateUser(UpdateUserRequest $request)
    {

        $dataArray = $request->all();

        try {
            $user = $this->userWriteService->updateUser($dataArray);

            return response()->json($user);
        } catch (Exception $e) {
            Log::error("User was not updated:" . $e->getMessage());
        }
    }

    public function deleteUser(DeleteUserRequest $request)
    {
        try {
            $user = $this->userWriteService->deleteUser($request->user_id);

            return response('User deleted!');
        } catch (Exception $e) {
            Log::error("User was not deleted:" . $e->getMessage());
        }
    }
}
