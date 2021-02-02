<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function index()
    {
       $users = User::orderBy('id', 'DESC')->paginate(20);
       return view('back-end.users.list', compact('users'));
    }

    function show($id) {
        return view('users.show');
    }

    function create() {
        return view('back-end.users.add');
    }

    function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('users.index');
    }

    function delete($id): \Illuminate\Http\RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}
