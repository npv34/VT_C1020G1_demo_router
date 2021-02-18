<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use Illuminate\Http\Request;

class ApiUserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    function index(): \Illuminate\Http\JsonResponse
    {
        $users = $this->userService->getAll();
        return response()->json($users);
    }
}
