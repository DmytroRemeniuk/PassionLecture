<?php

namespace Database\Seeders;

use App\Models\Apprecier;
use App\Models\Auteur;
use App\Models\Categorie;
use App\Models\Editeur;
use App\Models\Ouvrage;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([

            AuteurSeeder::class,
            CategorieSeeder::class,
            EditeurSeeder::class,
            UsersSeeder::class,
            OuvrageSeeder::class

        ]);
    }
}
