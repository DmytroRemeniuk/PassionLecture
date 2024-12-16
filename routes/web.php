<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LogicController;
use App\Http\Controllers\CategorieController;
use App\Models\Categorie;

//Page d'accueil
Route::get('/', [BookController::class, 'showLastFiveBooks'])->name('homepage');

//Liste des ouvrages
Route::get('/books', [BookController::class, 'allBooks'])->name('all-books');

//Route::get('/books', [BookController::class, 'index'])->name('books.index');

Route::get('/login', function(){
    return view('login');
})->name('login');

Route::get('/books/detail/{idOuvrage}', function ($idOuvrage) {
    // Recherchez les détails du livre dans la base de données (optionnel)
    $ouvrage = \App\Models\Ouvrage::findOrFail($idOuvrage);

    // Passez l'ouvrage aux vues
    return view('details', ['ouvrage' => $ouvrage]);
})->name('details');

Route::get('/books/add', [CategorieController::class, 'indexAdd'])->name('book.add');

Route::post('/books/add', [LogicController::class, 'addBook'])->name('logic.addBook');


