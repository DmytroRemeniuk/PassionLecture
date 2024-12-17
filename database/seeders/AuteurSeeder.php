<?php

namespace Database\Seeders;

use App\Models\Auteur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuteurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('t_auteur')->insert([
            ['auteur_id' => 1, 'nom' => 'Saint-Exupéry', 'prenom' => 'Antoine de'],
            ['auteur_id' => 2, 'nom' => 'Orwell', 'prenom' => 'George'],
            ['auteur_id' => 3, 'nom' => 'Tolkien', 'prenom' => 'J.R.R.'],
            ['auteur_id' => 4, 'nom' => 'Proust', 'prenom' => 'Marcel'],
            ['auteur_id' => 5, 'nom' => 'Dumas', 'prenom' => 'Alexandre'],
            ['auteur_id' => 6, 'nom' => 'Hugo', 'prenom' => 'Victor'],
            ['auteur_id' => 7, 'nom' => 'Coelho', 'prenom' => 'Paulo'],
            ['auteur_id' => 8, 'nom' => 'Hemingway', 'prenom' => 'Ernest'],
            ['auteur_id' => 9, 'nom' => 'Camus', 'prenom' => 'Albert'],
            ['auteur_id' => 10, 'nom' => 'Baudelaire', 'prenom' => 'Charles'],
            ['auteur_id' => 11, 'nom' => 'Brown', 'prenom' => 'Dan'],
            ['auteur_id' => 12, 'nom' => 'Austen', 'prenom' => 'Jane'],
            ['auteur_id' => 13, 'nom' => 'Frank', 'prenom' => 'Anne'],
            ['auteur_id' => 14, 'nom' => 'Maupassant', 'prenom' => 'Guy de'],
            ['auteur_id' => 15, 'nom' => 'Golden', 'prenom' => 'Arthur'],
            ['auteur_id' => 16, 'nom' => 'Süskind', 'prenom' => 'Patrick'],
            ['auteur_id' => 17, 'nom' => 'Gijoan', 'prenom' => 'René'],
            ['auteur_id' => 18, 'nom' => 'Stoker', 'prenom' => 'Bram'],
            ['auteur_id' => 19, 'nom' => 'Golden', 'prenom' => 'Arthur'],
        ]);

        //Auteur::factory(10)->create();
    }
}
