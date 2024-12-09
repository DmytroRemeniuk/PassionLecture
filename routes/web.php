<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LogicController;
use App\Http\Controllers\CategorieController;

Route::get('/', [BookController::class, 'showLastFiveBooks'])->name('homepage');

Route::get('/books/view', [BookController::class, 'allBooks'])->name('all-books');

Route::get('/login', function(){
    return view('login');
})->name('login');

Route::get('/books/view/detail', function(){
    return view('details');
})->name('details');



Route::get('/book/add', [CategorieController::class, 'index'])->name('book.add');

Route::post('/book/add', [LogicController::class, 'addBook'])->name('logic.addBook');


