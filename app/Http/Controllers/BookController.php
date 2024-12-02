<?php

namespace App\Http\Controllers;

use App\Models\Ouvrage;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\password;

class BookController extends Controller
{
    public function index()
    {
        // Récupérer tous les livres
        $books = Ouvrage::all();
        
        // Passer les livres à la vue 'books.index'
        return view('index', ['books' => $books]);
    }

    public function formLogin() {
        return view('login');
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
