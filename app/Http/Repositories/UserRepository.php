<?php


namespace App\Http\Repositories;


use App\Models\User;

class UserRepository
{
    function getAll() {
        return User::orderBy('id', 'DESC')->paginate(10);
    }
}
