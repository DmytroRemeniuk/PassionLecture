<?php

namespace Database\Seeders;

use App\Models\Auteur;
use App\Models\Categorie;
use App\Models\Editeur;
use App\Models\Ouvrage;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Utilisateur;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Auteur::factory(10)->create();
        Categorie::factory(10)->create();
        Editeur::factory(10)->create();
        User::factory(10)->create();
        Ouvrage::factory(10)->create();
    }
}
