<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    // méthode pour checker le login de l'utilisateur
    public function checkin()
    {
        // vérifier l'accion du formulaire
        request()->isMethod('post');

        /// La méthode validate() est utilisée pour valider les données de la requête entrantes selon les règles spécifiées. 
        /// Si la validation échoue, Laravel redirige automatiquement l'utilisateur vers la page précédente avec les messages d'erreur générés.
        /// Si la validation passe, le code continue normalement.
        $credentials = request()->validate([
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);
        
        $result = Auth::attempt([
            'name' => $credentials["email"],
            'password' => $credentials["password"],
            
        ]);

        //vérifier les identifiants 
        if($result){
            // Auth::user()
            //dd(request()->user());

            // creation d'une nouvelle session 
            request()->session()->regenerate();
            
            // redirection 
            return redirect()->route('homepage');
        }
        // Si pas de connexion redirection d'erreures
        else {
            return back()->withErrors([
                'email' => 'Le pseudo ou le mot de passe que vous avez entré est incorrect.',
            ]);
        }
    }
    // méthode de deconnexion 
    public function deconnexion(){
        // Déconnecte l'utilisateur
        Auth::logout();
        //vider les donnes de la session 
        session()->flush();
        
        // redirection 
        return redirect()->route('homepage');
    }



}
