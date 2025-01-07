<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApprecierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insertion des etoiles 
        DB::table('apprecier')->insert([
            ['utilisateur_fk' => 1, 'ouvrage_fk' => 1, 'note' => 5],
            ['utilisateur_fk' => 3, 'ouvrage_fk' => 3, 'note' => 5],
            ['utilisateur_fk' => 3, 'ouvrage_fk' => 2, 'note' => 2],
            ['utilisateur_fk' => 3, 'ouvrage_fk' => 4, 'note' => 5],
            ['utilisateur_fk' => 1, 'ouvrage_fk' => 4, 'note' => 4],
            ['utilisateur_fk' => 3, 'ouvrage_fk' => 6, 'note' => 5],
            ['utilisateur_fk' => 2, 'ouvrage_fk' => 7, 'note' => 4],
            ['utilisateur_fk' => 2, 'ouvrage_fk' => 9, 'note' => 3],
            ['utilisateur_fk' => 3, 'ouvrage_fk' => 10, 'note' => 4],
            ['utilisateur_fk' => 3, 'ouvrage_fk' => 11, 'note' => 5],
            ['utilisateur_fk' => 3, 'ouvrage_fk' => 12, 'note' => 2],
            ['utilisateur_fk' => 2, 'ouvrage_fk' => 11, 'note' => 3],
            ['utilisateur_fk' => 2, 'ouvrage_fk' => 14, 'note' => 4],
            ['utilisateur_fk' => 2, 'ouvrage_fk' => 15, 'note' => 4],
            ['utilisateur_fk' => 3, 'ouvrage_fk' => 16, 'note' => 2],
            ['utilisateur_fk' => 3, 'ouvrage_fk' => 18, 'note' => 5],
            ['utilisateur_fk' => 2, 'ouvrage_fk' => 19, 'note' => 1],
            ['utilisateur_fk' => 3, 'ouvrage_fk' => 20, 'note' => 3],
            ['utilisateur_fk' => 3, 'ouvrage_fk' => 1, 'note' => 3],
            ['utilisateur_fk' => 3, 'ouvrage_fk' => 9, 'note' => 3],
            ['utilisateur_fk' => 2, 'ouvrage_fk' => 2, 'note' => 4],
            ['utilisateur_fk' => 3, 'ouvrage_fk' => 19, 'note' => 2],
            ['utilisateur_fk' => 2, 'ouvrage_fk' => 10, 'note' => 3],
            ['utilisateur_fk' => 2, 'ouvrage_fk' => 1, 'note' => 3],
            ['utilisateur_fk' => 1, 'ouvrage_fk' => 11, 'note' => 4],
            ['utilisateur_fk' => 1, 'ouvrage_fk' => 18, 'note' => 4],
            ['utilisateur_fk' => 1, 'ouvrage_fk' => 1, 'note' => 5],
            ['utilisateur_fk' => 2, 'ouvrage_fk' => 8, 'note' => 3],
            ['utilisateur_fk' => 1, 'ouvrage_fk' => 5, 'note' => 3],
            ['utilisateur_fk' => 3, 'ouvrage_fk' => 13, 'note' => 4],
            ['utilisateur_fk' => 1, 'ouvrage_fk' => 17, 'note' => 4]
        ]);
    }
}
