<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EditeurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('t_editeur')->insert([
            ['editeur_id' => 1, 'nom' => 'Éditions du Seuil'],
            ['editeur_id' => 2, 'nom' => 'Gallimard'],
            ['editeur_id' => 3, 'nom' => 'Hachette Livre'],
            ['editeur_id' => 4, 'nom' => 'Penguin Random House'],
            ['editeur_id' => 5, 'nom' => 'Albin Michel'],
            ['editeur_id' => 6, 'nom' => 'Flammarion'],
            ['editeur_id' => 7, 'nom' => 'Pocket'],
            ['editeur_id' => 8, 'nom' => 'HarperCollins'],
            ['editeur_id' => 9, 'nom' => 'Livre de Poche'],
            ['editeur_id' => 10, 'nom' => 'Plon'],
            ['editeur_id' => 11, 'nom' => 'Editions Actes Sud'],
            ['editeur_id' => 12, 'nom' => 'Librio'],
            ['editeur_id' => 13, 'nom' => 'Editions Belfond'],
            ['editeur_id' => 14, 'nom' => 'Éditions Fayard'],
            ['editeur_id' => 15, 'nom' => 'Presses de la Cité'],
        ]);
    }
}
