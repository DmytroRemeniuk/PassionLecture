<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categorie::insert([
            [
                'nom' => 'Science Fiction',
            ],
            [
                'nom' => 'Fantasy',
            ],
            [
                'nom' => 'Histoire',
            ],
            [
                'nom' => 'Biographie',
            ],
            [
                'nom' => 'Thriller',
            ],
            [
                'nom' => 'Romance',
            ],
        ]);
    }
}
