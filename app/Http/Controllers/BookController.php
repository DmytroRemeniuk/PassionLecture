<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ouvrage;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Auth;

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
        //dd(request()->isMethod('post'));
        request()->isMethod('post');

        /// La méthode validate() est utilisée pour valider les données de la requête entrantes selon les règles spécifiées. 
        /// Si la validation échoue, Laravel redirige automatiquement l'utilisateur vers la page précédente avec les messages d'erreur générés.
        /// Si la validation passe, le code continue normalement.
        $credentials = request()->validate([
            'pseudo' => ['required', 'string'],
            'motDePasse' => ['required','string'], 
        ]);
        $result = Auth::attempt([
            'pseudo' => $credentials["pseudo"],
            'motDePasse' => $credentials["motDePasse"],
        ]);
        dd($result);

        // Essaie de connecter un utilisateur et renvoie true en cas de succès
        /*if(Auth::attempt([
            'pseudo' => request()->input('pseudo'),
            'motDePasse' => request()->input('motDePasse'), filled('remember')
            ]))
        {
            request()->session()->regenerate();
            return redirect()->route('homepage');
        }*/

    }

}
