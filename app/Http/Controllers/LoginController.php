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
        //dd(request()->isMethod('post'));
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

        if($result == true){
            // Recuperer les users 
            $users = User::all();
            //stocker le status
            $isAdmin = "";
            // Parrcourir les users 
            foreach($users as $user){
                // Tableau avec les valeurs de la db selon l'user 
                $user->attributesToArray();
                // Verifier si il est admin 
                if($user['estAdmin'] == 0){
                    $isAdmin = false;
                }else {
                    $isAdmin = true;
                }
            }

            // creation d'une nouvelle session 
            request()->session()->regenerate();
            // ajouter les infos de l'utilisateur dans la session 
            request()->session()->put('name','isAdmin');
            // stocker les infos dans la session 
            session(['name' => $credentials["email"]]);
            session(['isAdmin' => $isAdmin]);

            // redirection 
            return redirect()->route('homepage');
        }else {
            return back()->withErrors([
                'email' => 'Le pseudo ou le mot de passe que vous avez entré est incorrect.',
            ]);
        }
    }

    public function deconnexion(){
        // Déconnecte l'utilisateur
        Auth::logout();
        //vider les donnes de la session 
        session()->flush();
        
        // redirection 
        return redirect()->route('homepage');
    }



}
