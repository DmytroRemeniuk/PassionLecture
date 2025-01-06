<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LogicController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ApprecierController;
use Illuminate\Auth\Events\Login;

//Page d'accueil
Route::get('/', [BookController::class, 'showLastFiveBooks'])->name('homepage');

//Liste des ouvrages
Route::get('/books', [BookController::class, 'allBooks'])->name('all-books');

Route::get('/login', function(){
    return view('login');
})->name('login');

//Page de connexion
Route::get('/profil', function () {
    return view('profil');
})->name('profil');

Route::get('/profil/{idUser}', [BookController::class, 'getBooksByUser'])->name('profil');

Route::post('user.login', [LoginController::class, 'checkin'])->name('user.login');

Route::get('user.deconnexion', [LoginController::class, 'deconnexion'])->name('user.deconnexion');

Route::get('user.deconnexion', [LoginController::class, 'deconnexion'])->name('user.deconnexion');

Route::get('user.deconnexion', [LoginController::class, 'deconnexion'])->name('user.deconnexion');

//Page d'inscription
Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('user.register', [RegisterController::class, 'register'])->name('user.register');

Route::get('/books/detail/{idOuvrage}/{vote?}', function ($idOuvrage, $vote = null) {
    // Recherchez les détails du livre dans la base de données (optionnel)
    $ouvrage = \App\Models\Ouvrage::findOrFail($idOuvrage);

    if($vote != null)
    {
        ApprecierController::store($idOuvrage, Auth::user()->id, $vote);
    }

    // Passez l'ouvrage aux vues
    return view('details', ['ouvrage' => $ouvrage]);

})->name('details');

Route::get('/books/add', [CategorieController::class, 'indexAdd'])->name('book.add');

Route::get('/books/add', [CategorieController::class, 'indexAdd'])->name('book.add');

Route::post('/books/add', [LogicController::class, 'addBook'])->name('logic.addBook');

Route::get('/books/edit/{idOuvrage}', [LogicController::class, 'editBookShow'])->name('book.edit');

Route::post('/books/edit/{idOuvrage}', [LogicController::class, 'editBook'])->name('logic.editBook');

Route::get('/book/delete/{idOuvrage}', [BookController::class, 'destroy'])->name('logic.deleteBook');

