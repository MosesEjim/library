<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
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
Route::get('/', [BookController::class, 'index'])->name('home');



Route::get('/login', [UserController::class, 'login_get'])->name('login.get');
Route::post('/login', [UserController::class, 'login_post'])->name('login.post');
Route::get('/signup', [UserController::class, 'signup_get'])->name('signup.get');
Route::post('/signup', [UserController::class, 'signup_post'])->name('signup.post');

Route::group(['prefix'=>'books'], function(){
    Route::get('/upload', [BookController::class, 'create'])->name('book.create');
    Route::post('/upload', [BookController::class, 'store'])->name('book.store');
    Route::get('/edit/{id}', [BookController::class, 'edit'])->name('book.edit');
    Route::put('/edit/{id}', [BookController::class, 'update'])->name('book.update');
});
