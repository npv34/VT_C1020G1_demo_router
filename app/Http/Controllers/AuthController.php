<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    function showFormRegister() {
        return view('auth.register');
    }

    function register(Request $request) {
        dd($request->all());
    }
}
