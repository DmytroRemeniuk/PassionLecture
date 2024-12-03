<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ouvrage;
use App\Models\Utilisateur;

class BookController extends Controller
{
    public function allBooks(){
        $ouvrages = Ouvrage::paginate(10); // 10 ouvrages par page
        return view('allBooks', ['ouvrages' => $ouvrages]);
    }

    public function showLastFiveBooks(){

        $lastFiveBooks = Ouvrage::getLastFiveBooks();

        return view('index', ['lastFiveBooks' => $lastFiveBooks]);
    }

    // méthode pour checker le login de l'utilisateur
    public function checkin(){
        /// La méthode validate() est utilisée pour valider les données de la requête entrantes selon les règles spécifiées. 
        /// Si la validation échoue, Laravel redirige automatiquement l'utilisateur vers la page précédente avec les messages d'erreur générés.
        /// Si la validation passe, le code continue normalement.
        $request = Request::request()->validate([
            'pseudo' => ['required', 'string'],
            'motDePasse' => ['required','string'], 
        ]);

        // Essaie de connecter un utilisateur et renvoie true en cas de succès
        if(Auth::attempt([
            'pseudo' => $request->input('pseudo'),
            'password' => $request->input('motDePasse'),
        ], filled('remember'))){
            return redirect()->route('/');
        }
    }

}
