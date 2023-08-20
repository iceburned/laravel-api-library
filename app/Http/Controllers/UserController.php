<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\DeleteUserRequest;
use App\Http\Requests\GetUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\UserReadService;
use App\Services\UserWriteService;
use Exception;



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

    public function createUser(CreateUserRequest $request)
    {

        $dataArray = $request->all();

        try {
            $user = $this->userWriteService->createUser($dataArray);
        } catch (Exception $e) {
            //TODO: Logging
        }

        return response('User created!', '201');
    }

    public function updateUser(UpdateUserRequest $request)
    {

        $dataArray = $request->all();

        try {
            $user = $this->userWriteService->updateUser($dataArray);
        } catch (Exception $e) {
            //TODO: Logging
        }

        return response()->json($user);
    }

    public function deleteUser(DeleteUserRequest $request)
    {
        try {
            $user = $this->userWriteService->deleteUser($request->user_id);
        } catch (Exception $e) {
            //TODO: Logging
        }

        return response('User deleted!');
    }
}
