<?php

namespace Database\Seeders;

use App\Models\Auteur;
use App\Models\Categorie;
use App\Models\Editeur;
use App\Models\Ouvrage;
use App\Models\User;
use App\Models\Utilisateur;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AuteurSeeder::class);
        $this->call(EditeurSeeder::class);
        $this->call(CategorieSeeder::class);
        $this->call(UtilisateurSeeder::class);
        $this->call(OuvrageSeeder::class);
        $this->call(ApprecierSeeder::class);
        
    }
}
