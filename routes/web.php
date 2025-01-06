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

//Page de login
Route::get('/login', function(){
    return view('login');
})->name('login');

//Page de profil
Route::get('/profil', function () {
    return app(BookController::class)->getBooksByUser(Auth::id());
})->name('monprofil');

Route::get('/profil/{idUser}', [BookController::class, 'getBooksByUser'])->name('profil');

//Vérification du éogin
Route::post('user.login', [LoginController::class, 'checkin'])->name('user.login');

//Déconnexion
Route::get('user.deconnexion', [LoginController::class, 'deconnexion'])->name('user.deconnexion');

//Page d'inscription
Route::get('/register', function () {
    return view('register');
})->name('register');

//Inscription
Route::post('user.register', [RegisterController::class, 'register'])->name('user.register');

//Page de details
Route::get('/books/detail/{idOuvrage}/{vote?}', function ($idOuvrage, $vote = null) {
    if($vote != null && $vote > 0 && $vote < 6 && Auth::check())
    {
        ApprecierController::store($idOuvrage, Auth::user()->id, $vote);
    }

    // Rechercher les détails du livre dans la base de données (optionnel)
    $ouvrage = \App\Models\Ouvrage::findOrFail($idOuvrage);
    // Rechercher une note d'utilisateur
    $userVote = ApprecierController::getUserVote($idOuvrage, Auth::id());

    // Nombre et moyenne d'appreciations
    $nbAppreciations = ApprecierController::count($idOuvrage);
    $avgAppreciation = ApprecierController::avg($idOuvrage);


    // Passez les variables à la vue
    return view('details', ['ouvrage' => $ouvrage, 'nbAppreciations' => $nbAppreciations, 'avgAppreciation' => $avgAppreciation, 'userVote' => $userVote]);

})->name('details');

//Page d'ajout
Route::get('/books/add', [CategorieController::class, 'indexAdd'])->name('book.add');

//Ajout de livre
Route::post('/books/add', [LogicController::class, 'addBook'])->name('logic.addBook');

//Page de modification
Route::get('/books/edit/{idOuvrage}', [LogicController::class, 'editBookShow'])->name('book.edit');

//Modification
Route::post('/books/edit/{idOuvrage}', [LogicController::class, 'editBook'])->name('logic.editBook');

//Supprimer un livre
Route::get('/book/delete/{idOuvrage}', [BookController::class, 'destroy'])->name('logic.deleteBook');
