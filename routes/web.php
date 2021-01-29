<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('register', [\App\Http\Controllers\AuthController::class,'showFormRegister'])->name('auth.showFormRegister');

Route::middleware('checkAge')->group(function (){
    Route::post('register', [\App\Http\Controllers\AuthController::class,'register'])->name('auth.register');
});

Route::prefix('users')->group(function (){
    Route::get('/', [\App\Http\Controllers\UserController::class, 'index']);
    Route::get('/{id}', [\App\Http\Controllers\UserController::class, 'show'])->name('users.show');
    Route::get('/create', [\App\Http\Controllers\UserController::class, 'showFormCreate'])->name('users.showFormCreate');
});
