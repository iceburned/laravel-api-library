<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\GetUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Interfaces\UserReadInterface;
use App\Interfaces\UserWriteInterface;
use App\Services\UserReadService;
use App\Services\UserWriteService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


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

    public function getUser($id)
    {

        $validator = Validator::make(['id' => $id], [
            'id' => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Invalid input'], 400);
        }

        $user = $this->userReadService->getUserById($id);

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

    public function deleteUser($id)
    {

        $validator = Validator::make(['id' => $id], [
            'id' => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Invalid input'], 400);
        }

        try {
            $user = $this->userWriteService->deleteUser($id);
        } catch (Exception $e) {
            //TODO: Logging
        }

        return response('User deleted!');
    }
}
