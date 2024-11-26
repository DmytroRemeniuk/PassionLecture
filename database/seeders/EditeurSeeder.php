<?php

namespace Database\Seeders;

use App\Models\Editeur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EditeurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Editeur::insert([
            [
                'nom' => 'Éditions Gallimard',
            ],
            [
                'nom' => 'Penguin Books',
            ],
            [
                'nom' => 'HarperCollins',
            ],
            [
                'nom' => 'Flammarion',
            ],
            [
                'nom' => 'Éditions du Seuil',
            ],
        ]);
    }
}
