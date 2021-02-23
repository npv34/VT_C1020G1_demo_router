<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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
Route::get('login', [AuthController::class,'showFormLogin'])->name('login');
Route::post('login', [AuthController::class,'login'])->name('auth.login');

Route::middleware(['setLocale', 'auth'])->prefix('admin')->group(function () {
    Route::get('', [HomeController::class, 'index'])->name('home.dashboard');
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/create', [UserController::class, 'store'])->name('users.store');
        Route::get('/{id}/delete', [UserController::class, 'delete'])->name('users.delete');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/{id}/edit', [UserController::class, 'update'])->name('users.update');
        Route::get('/search', [UserController::class, 'search']);
    });

    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('products.index');
        Route::get('/getAll', [ProductController::class, 'getAll']);
        Route::get('/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/create', [ProductController::class, 'store'])->name('products.store');
        Route::get('{id}/delete', [ProductController::class, 'destroy']);
    });

    Route::prefix('categories')->group(function () {
        Route::get('/{id}/products', [CategoryController::class, 'getProductByCategoryId'])->name('categories.getProductByCategoryId');

    });

    // set locale
    Route::get('language', [LanguageController::class, 'setLocale'])->name('Language.setLocale');

    Route::get('logout',[AuthController::class, 'logout'])->name('logout');
});

Route::get('/', [HomeController::class, 'showHomePage'])->name('showHomePage');
Route::get('{id}/add-to-cart', [CartController::class, 'addToCart'])->name('cart.addToCart');
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
});
