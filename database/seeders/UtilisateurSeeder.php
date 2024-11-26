<?php

namespace Database\Seeders;

use App\Models\Utilisateur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UtilisateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Utilisateur::insert([
            [
                'pseudo' => 'admin',
                'dateEntree' => '2024-05-01',  // Exemple de date d'entrée
                'isAdmin' => true,
            ],
            [
                'Pseudo' => 'user1',
                'dateEntree' => '2024-06-01',
                'isAdmin' => false,
            ],
            [
                'pseudo' => 'user2',
                'dateEntree' => '2024-07-01',
                'isAdmin' => false,
            ],
        ]);
    }
}
