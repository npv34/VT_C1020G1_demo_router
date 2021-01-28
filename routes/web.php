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

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/birthday', function () {
    return view('home');
})->name('view-birthday');

Route::post('/birthday', function (\Illuminate\Http\Request $request) {
    $birthday = $request->birthday;
    $current = new \Carbon\Carbon($birthday);
    $age = $current->age;
    dd($age);

})->name('birthday');

Route::get('location/{city?}', function (\Illuminate\Http\Request $request) {
    if ($request->time_zone) {
        $timeZone = $request->time_zone;
        $carbon = \Carbon\Carbon::now($timeZone);
        echo $carbon->hour;
    }

    return view('location');
})->name('get-time-location');
