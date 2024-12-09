<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LogicController;
use App\Http\Controllers\LoginController;

Route::get('/', [BookController::class, 'showLastFiveBooks'])->name('homepage');

Route::get('/books/view', [BookController::class, 'allBooks'])->name('all-books');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login' [LoginController::class], 'checkin')->name('user.login');

Route::get('/books/view/detail', function () {
    return view('details');
})->name('details');

Route::get('/book/add', function () {
    return view('addBook');
})->name('book.add');

Route::post('/book/add', [LogicController::class, 'addBook'])->name('logic.addBook');
