<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('homepage');

Route::get('/books/view', function () {
    return view('allBooks');
})->name('all-books');

Route::get('/books/view', [BookController::class, 'allBooks'])->name('all-books');

Route::get('/books', [BookController::class, 'index'])->name('books.index');

Route::get('/login', function(){
    return view('login');
})->name('login');

Route::get('/books/view/detail', function(){
    return view('details');
})->name('details');

