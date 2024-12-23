<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class RegisterController extends Controller
{
    // méthode pour gérer l'inscription
    public function register(Request $request)
    {
        // Valider les données envoyées par le formulaire
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'], // Ajout du champ 'name'
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Vérifier si un utilisateur avec cet email existe déjà (ignorer la casse)
        $existingUser = User::whereRaw('LOWER(email) = ?', [strtolower($validatedData['email'])])->first();
        if ($existingUser) {
            return back()->withErrors(['email' => 'Cet email est déjà utilisé.'])->withInput();
        }

        // Créer le nouvel utilisateur
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => strtolower($validatedData['email']),
            'password' => Hash::make($validatedData['password']),
            'dateEntree' => Carbon::now(),
        ]);

        // Connecter l'utilisateur automatiquement après inscription
        Auth::login($user);

        // Rediriger vers la page d'accueil avec un message de succès
        return redirect()->route('homepage')->with('success', 'Inscription réussie, bienvenue !');
    }
}
