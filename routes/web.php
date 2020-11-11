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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'show'])->name('accueil');
Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'show'])->name('register');
Route::get('/login', function () {
    return view('login');
});
