<?php

namespace Database\Seeders;

use App\Models\Auteur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuteurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            [
                'name' => 'Doe',
                'prenom' => 'John',
            ],
            [
                'name' => 'Rowling',
                'Prenom' => 'J.K.',
            ],
            [
                'name' => 'Martin',
                'prenom' => 'George R.R.',
            ],
            [
                'name' => 'Sagan',
                'prenom' => 'Françoise',
            ],
            [
                'name' => 'Hemingway',
                'prenom' => 'Ernest',
            ],
            [
                'name' => 'Austen',
                'prenom' => 'Jane',
            ],
        ];
        
        Auteur::insert($data);
    }
}
