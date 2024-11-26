<?php

namespace Database\Seeders;

use App\Models\Ouvrage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OuvrageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ouvrage::insert([
            [
                'titre' => 'Le Seigneur des Anneaux',
                'extrait' => 'Extrait: Dans une taverne, Frodon rencontre un mystérieux étranger...',
                'resume' => 'Un jeune hobbit part en quête pour détruire un anneau maléfique.',
                'annee' => '1954-07-29',
                'image' => 'seigneur_anneaux.jpg',
                'nbPages' => 423,
                'utilisateur_fk' => 1, // Utilisateur avec ID 1
                'categorie_fk' => 2,    // Catégorie "Fantasy" (ID 2)
                'editeur_fk' => 2,      // Editeur "Penguin Books" (ID 2)
                'auteur_fk' => 2,       // Auteur "J.K. Rowling" (ID 2)
            ],
            [
                'titre' => 'Harry Potter à l\'École des Sorciers',
                'extrait' => 'Extrait: Harry découvre qu\'il est un sorcier et part pour Poudlard...',
                'resume' => 'Harry Potter, un orphelin, découvre un monde magique et ses pouvoirs.',
                'annee' => '1997-06-26',
                'image' => 'harry_potter.jpg',
                'nbPages' => 309,
                'utilisateur_fk' => 2, // Utilisateur avec ID 2
                'categorie_fk' => 1,    // Catégorie "Science Fiction" (ID 1)
                'editeur_fk' => 1,      // Editeur "Éditions Gallimard" (ID 1)
                'auteur_fk' => 3,       // Auteur "George R.R. Martin" (ID 3)
            ],
            [
                'titre' => 'Le Trône de Fer',
                'extrait' => 'Extrait: Dans le royaume de Westeros, les luttes pour le trône sont sans fin...',
                'resume' => 'Les familles nobles de Westeros se battent pour le contrôle du trône.',
                'annee' => '1996-08-06',
                'image' => 'trone_de_fer.jpg',
                'nbPages' => 694,
                'utilisateur_fk' => 3, // Utilisateur avec ID 3
                'categorie_fk' => 3,    // Catégorie "Histoire" (ID 3)
                'editeur_fk' => 3,      // Editeur "HarperCollins" (ID 3)
                'auteur_fk' => 1,       // Auteur "John Doe" (ID 1)
            ],
            [
                'titre' => 'La Peste',
                'extrait' => 'Extrait: Un étrange fléau se répand dans la ville d\'Oran...',
                'resume' => 'L\'épidémie de peste bouleverse une ville et ses habitants, mettant à l\'épreuve leur humanité.',
                'annee' => '1947-06-10',
                'image' => 'peste.jpg',
                'nbPages' => 318,
                'utilisateur_fk' => 4, // Utilisateur avec ID 4
                'categorie_fk' => 4,    // Catégorie "Biographie" (ID 4)
                'editeur_fk' => 4,      // Editeur "Flammarion" (ID 4)
                'auteur_fk' => 4,       // Auteur "Françoise Sagan" (ID 4)
            ],
            [
                'titre' => 'Le Vieil Homme et la Mer',
                'extrait' => 'Extrait: Un vieux pêcheur lutte pour attraper un gigantesque marlin...',
                'resume' => 'L\'histoire d\'un homme solitaire qui combat la mer et ses créatures.',
                'annee' => '1952-09-01',
                'image' => 'vieil_homme_mer.jpg',
                'nbPages' => 128,
                'utilisateur_fk' => 5, // Utilisateur avec ID 5
                'categorie_fk' => 5,    // Catégorie "Thriller" (ID 5)
                'editeur_fk' => 5,      // Editeur "Éditions du Seuil" (ID 5)
                'auteur_fk' => 5,       // Auteur "Ernest Hemingway" (ID 5)
            ],
            [
                'titre' => 'Orgueil et Préjugés',
                'extrait' => 'Extrait: Elizabeth Bennet rencontre le riche et mystérieux Mr. Darcy...',
                'resume' => 'Un roman d\'amour et de malentendus entre Elizabeth Bennet et Mr. Darcy.',
                'annee' => '1813-01-28',
                'image' => 'orgueil_prejuges.jpg',
                'nbPages' => 279,
                'utilisateur_fk' => 6, // Utilisateur avec ID 6
                'categorie_fk' => 6,    // Catégorie "Romance" (ID 6)
                'editeur_fk' => 1,      // Editeur "Éditions Gallimard" (ID 1)
                'auteur_fk' => 6,       // Auteur "Jane Austen" (ID 6)
            ],
        ]);
    }
}
