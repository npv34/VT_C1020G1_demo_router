<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function index()
    {
        $users = [
            [
                "id" => 1,
                "name" => "uyen",
                "email" => "uyen@gmail.com",
                "address" => "VT"
            ],
            [
                "id" => 2,
                "name" => "thuong",
                "email" => "thuong@gmail.com",
                "address" => "VT"
            ],

        ];

        return view('users.list', compact('users'));
    }

    function show($id) {
        return view('users.show');
    }

    function showFormCreate() {

    }
}
