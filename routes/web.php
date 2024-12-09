<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LogicController;
use App\Http\Controllers\CategorieController;

//Page d'accueil
Route::get('/', [BookController::class, 'showLastFiveBooks'])->name('homepage');

//Liste des ouvrages
Route::get('/books/view', [BookController::class, 'indexAllBooks'])->name('all-books');

//Page de connexion
<<<<<<< HEAD
Route::get('/login', function () {

=======
Route::get('/login', function(){
>>>>>>> 77fc14f1c7ca9bc37714695e749fcacfee2ada13
    return view('login');
})->name('login');

Route::get('/books/view/detail/{idOuvrage}', function ($idOuvrage) {
    // Recherchez les détails du livre dans la base de données (optionnel)
    $ouvrage = \App\Models\Ouvrage::findOrFail($idOuvrage);

    // Passez l'ouvrage aux vues
    return view('details', ['ouvrage' => $ouvrage]);
})->name('details');



Route::get('/book/add', [CategorieController::class, 'index'])->name('book.add');

Route::post('/book/add', [LogicController::class, 'addBook'])->name('logic.addBook');


