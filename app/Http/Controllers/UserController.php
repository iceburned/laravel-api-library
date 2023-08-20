<?php

namespace App\Http\Controllers;

use App\Interfaces\UserReadInterface;
use App\Interfaces\UserWriteInterface;
use Illuminate\Http\Request;


class UserController extends Controller
{
    private UserReadInterface $userReadService;
    private UserWriteInterface $userWriteService;

    public function __construct(UserReadInterface $userReadService, UserWriteInterface $userWriteService)
    {

        $this->userReadService = $userReadService;
        $this->userWriteService = $userWriteService;
    }

    public function getAllUsers(){
        $users = $this->userReadService->getAllUsers();

        return response()->json($users);
    }

    public function createUser(Request $request){

    }
}
