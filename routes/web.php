<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('index');
});


Route::get('/book/add', [BookController::class, 'get']);

Route::post('/book/add', [BookController::class, 'add']);


