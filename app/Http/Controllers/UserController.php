<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Services\UserService;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    function index()
    {
       $users = $this->userService->getAll();
       return view('back-end.users.list', compact('users'));
    }

    function show($id) {
        return view('users.show');
    }

    function create() {
        // goi xuong model Role de lay data
        $roles = Role::all();
        //truyen du lieu xuong view
        return view('back-end.users.add', compact('roles'));
    }

    function store(CreateUserRequest $request): \Illuminate\Http\RedirectResponse
    {
        //tao moi user
        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($request->password);

        //upload file
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $path = $image->store('images', 'public');
            $user->image = $path;
        }

        $user->save();

        // tao moi role_user
        $user->roles()->sync($request->role_id);

        return redirect()->route('users.index');
    }

    function delete($id): \Illuminate\Http\RedirectResponse
    {
        $user = User::findOrFail($id);
        //xoa anh nguoi dung

        //go role nguoi dung
        $user->roles()->detach();
        //xoa nguoi dung
        $user->delete();
        return redirect()->route('users.index');
    }

    function edit($id) {
        if (!$this->userCan('curd-user')){
            abort(403);
        }
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('back-end.users.edit', compact('user', 'roles'));
    }

    function update(Request $request, $id) {
        if (!$this->userCan('curd-user')){
            abort(403);
        }
        $user = User::findOrFail($id);
        // update role
        $user->roles()->sync($request->role_id);
        $user->fill($request->all());
        $user->save();
        return redirect()->route('users.index');
    }

    function search(Request $request) {
        $name = $request->name;
        $users = User::where('name', 'LIKE', '%' . $name . '%')->paginate(5);
        return response()->json($users);
    }
}
