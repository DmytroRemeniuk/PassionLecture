<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LogicController;

//Page d'accueil
Route::get('/', [BookController::class, 'showLastFiveBooks'])->name('homepage');

//Liste des ouvrages
Route::get('/books/view', [BookController::class, 'allBooks'])->name('all-books');

//Page de connexion
Route::get('/login', function(){

    return view('login');

})->name('login');

//Détails d'un ouvrage
Route::get('/books/view/detail', function(){

    return view('details');

})->name('details');

Route::get('/book/add', function () {
    return view('addBook');
})->name('book.add');

Route::post('/book/add', [LogicController::class, 'addBook'])->name('logic.addBook');
