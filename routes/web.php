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



Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/login', [UserController::class, 'login_get'])->name('login.get');
Route::post('/login', [UserController::class, 'login_post'])->name('login.post');
Route::get('/signup', [UserController::class, 'signup_get'])->name('signup.get');
Route::post('/signup', [UserController::class, 'signup_post'])->name('signup.post');
// routes accessible to only admin
Route::group(['prefix'=>'books', 'middleware'=>['auth','librarian']], function(){
    Route::get('/upload', [BookController::class, 'create'])->name('book.create');
    Route::post('/upload', [BookController::class, 'store'])->name('book.store');
    Route::get('/edit/{id}', [BookController::class, 'edit'])->name('book.edit');
    Route::put('/edit/{id}', [BookController::class, 'update'])->name('book.update');
    Route::get('/all-borrowed-books', [BookController::class, 'all_borrowed_books'])->name('book.all.borrowed');
});
// routes accessible to logged in users
Route::group(['middleware'=>'auth'], function(){
    Route::put('/checkout/{id}', [BookController::class, 'check_out'])->name('book.checkout');
    Route::put('/checkin/{id}', [BookController::class, 'check_in'])->name('book.checkin');
    Route::get('/borrowed-books', [BookController::class, 'user_books'])->name('book.borrowed');
});