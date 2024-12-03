<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Models\Utilisateur;

Route::get('/', [BookController::class, 'showLastFiveBooks'])->name('homepage');

Route::get('/books/view', function () {
    return view('allBooks');
})->name('all-books');

Route::get('/books/view', [BookController::class, 'allBooks'])->name('all-books');

Route::post('/login',[BookController::class, 'checkin'])->name('user.login');

Route::get('/login', function(){  
    return view('login');
})->name('login');


Route::get('/books/view/detail', function(){
    return view('details');
})->name('details');


