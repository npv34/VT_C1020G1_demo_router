<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    function showFormRegister()
    {
        return view('auth.register');
    }

    function register(Request $request)
    {
        dd($request->all());
    }

    function showFormLogin()
    {
        return view('auth.login');
    }

    function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('admin');
        }
        Session::flash('login-error','The provided credentials do not match our records.');
        return back();
    }

    function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
