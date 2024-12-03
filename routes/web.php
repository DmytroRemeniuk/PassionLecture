<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', [BookController::class, 'showLastFiveBooks'])->name('homepage');

Route::get('/books/view', [BookController::class, 'allBooks'])->name('all-books');

Route::get('/login', function(){
    return view('login');
})->name('login');

Route::get('/books/view/detail', function(){
    return view('details');
})->name('details');



Route::get('/book/add', [BookController::class, 'get']);

Route::post('/book/add', [BookController::class, 'add']);


