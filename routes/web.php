<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [BookController::class, 'main']);
Route::post('/', [BookController::class, 'store']);
Route::get('/search', [BookController::class, 'search'])->name('books.search');
Route::get('/profile',[HomeController::class, 'show']);
Route::resource('books', BookController::class);
Route::resource('genres', GenreController::class);
Route::resource('borrows', BorrowController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
