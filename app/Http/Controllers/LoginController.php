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
            'name' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $result = Auth::attempt([
            'name' => $credentials["name"],
            'password' => $credentials["password"],
            
        ]);

        // Essaie de connecter un utilisateur et renvoie true en cas de succès
        if($result === Auth::check()){

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
            session(['name' => $credentials["name"]]);
            session(['isAdmin' => $isAdmin]);

            // redirection 
            return redirect()->route('homepage');
        }
        // Si l'email ou le mot de passe est incorrect
        elseif (!Auth::attempt(['name' => $credentials["name"], 'password' => $credentials["password"]])) {
            return back()->withErrors([
                'name' => 'Le pseudo ou le mot de passe que vous avez entré est incorrect.',
            ]);
        }
    }
}
