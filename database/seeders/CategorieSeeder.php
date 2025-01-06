<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('t_categorie')->insert([
            ['categorie_id' => 1, 'nom' => 'Aventure'],
            ['categorie_id' => 2, 'nom' => 'Science-fiction'],
            ['categorie_id' => 3, 'nom' => 'Fantasy'],
            ['categorie_id' => 4, 'nom' => 'Littérature classique'],
            ['categorie_id' => 5, 'nom' => 'Historique'],
            ['categorie_id' => 6, 'nom' => 'Romance'],
            ['categorie_id' => 7, 'nom' => 'Philosophique'],
            ['categorie_id' => 8, 'nom' => 'Policier'],
            ['categorie_id' => 9, 'nom' => 'Thriller'],
            ['categorie_id' => 10, 'nom' => 'Poésie'],
            ['categorie_id' => 11, 'nom' => 'Guerre'],
            ['categorie_id' => 12, 'nom' => 'Fantastique'],
            ['categorie_id' => 13, 'nom' => 'Biographie'],
            ['categorie_id' => 14, 'nom' => 'Conte'],
            ['categorie_id' => 15, 'nom' => 'Humour'],
        ]);
    }
}
