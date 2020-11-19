<?php

use App\Http\Controllers\LicenseController;
use App\Http\Controllers\MembershipController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
Route::middleware('auth')->group(function () {
    Route::get('users/search','App\Http\Controllers\UserController@search')->name('search');
    Route::resource('users', UserController::class);
});
Route::middleware('admin')->group(function () {
    Route::resource('licenses', LicenseController::class); //a mettre en admin
    Route::resource('memberships', MembershipController::class); //a mettre en admin
});

Route::get('/', [\App\Http\Controllers\HomeController::class, 'show'])->name('accueil');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
