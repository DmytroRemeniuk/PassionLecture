<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LogicController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\LoginController;
use Illuminate\Auth\Events\Login;

//Page d'accueil
Route::get('/', [BookController::class, 'showLastFiveBooks'])->name('homepage');

//Liste des ouvrages
Route::get('/books/view', [BookController::class, 'indexAllBooks'])->name('all-books');

//Page de connexion
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('user.login', [LoginController::class, 'checkin'])->name('user.login');


Route::get('/books/view/detail/{idOuvrage}', function ($idOuvrage) {
    // Recherchez les détails du livre dans la base de données (optionnel)
    $ouvrage = \App\Models\Ouvrage::findOrFail($idOuvrage);

    // Passez l'ouvrage aux vues
    return view('details', ['ouvrage' => $ouvrage]);
})->name('details');



Route::get('/book/add', [CategorieController::class, 'index'])->name('book.add');

Route::post('/book/add', [LogicController::class, 'addBook'])->name('logic.addBook');


