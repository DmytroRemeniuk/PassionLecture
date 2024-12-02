<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ouvrage;

class BookController extends Controller
{
    public function showLastFiveBooks(){

        //Récupère tous les ouvrages
        $ouvrages = Ouvrage::all();

        return view('index', ['ouvrages' => $ouvrages]);
    }
}
