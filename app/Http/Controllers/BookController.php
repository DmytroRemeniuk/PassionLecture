<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ouvrage;

class BookController extends Controller
{

    //Récupère le résultat de la requete pour obtenir les 5 denrniers livres
    public function showLastFiveBooks(){

        //récupère les 5 derniers livres
        $lastFiveBooks = Ouvrage::getLastFiveBooks();

        //Passe les livres à la vue index
        return view('index', ['lastFiveBooks' => $lastFiveBooks]);
    }
}
