<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    // méthode pour checker le login de l'utilisateur
    public function checkin(){
        //dd(request()->isMethod('post'));
        request()->isMethod('post');

        /// La méthode validate() est utilisée pour valider les données de la requête entrantes selon les règles spécifiées. 
        /// Si la validation échoue, Laravel redirige automatiquement l'utilisateur vers la page précédente avec les messages d'erreur générés.
        /// Si la validation passe, le code continue normalement.
        $credentials = request()->validate([
            'email' => ['required', 'string'],
            'password' => ['required','string'], 
        ]);
        // dd($credentials);
        $result = Auth::attempt([
            'email' => $credentials["email"],
            'password' => $credentials["password"],
        ]);
        
        /*password_hash("test",PASSWORD_BCRYPT);*/
        /*dd($result);
        dd(Auth::check());*/
        
        
        // Essaie de connecter un utilisateur et renvoie true en cas de succès
        if($result === Auth::check()){
            request()->session()->regenerate();
            return redirect()->route('homepage');
        } 
        // Si l'email ou le mot de passe est incorrect
        elseif(!Auth::attempt(['email' => $credentials["email"], 'password' => $credentials["password"]])) {
            return back()->withErrors([
                'email' => 'L\'adresse e-mail ou le mot de passe que vous avez entré est incorrect.',
            ]);
        }

    }     

}
