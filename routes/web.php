<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/',[BookController::class, 'index']);

/// page de login
Route::get('/login',[BookController::class, 'formLogin'])->name('login');


Route::post('/login', [BookController::class, 'checkin']);

