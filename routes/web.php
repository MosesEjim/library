<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [UserController::class, 'login_get'])->name('login.get');
Route::post('/login', [UserController::class, 'login_post'])->name('login.post');
Route::get('/signup', [UserController::class, 'signup_get'])->name('signup.get');
Route::post('/signup', [UserController::class, 'signup_post'])->name('signup.post');
