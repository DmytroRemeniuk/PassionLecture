<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OuvrageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('t_ouvrage')->insert([
            ['ouvrage_id' => 1, 'titre' => 'Le Petit Prince', 'extrait' => 'Un conte poétique...', 'resume' => 'Histoire d’un petit garçon...', 'annee' => 1943, 'image' => 'petitprince.jpg', 'nbPages' => 96, 'utilisateur_fk' => 2, 'categorie_fk' => 1, 'editeur_fk' => 1, 'auteur_fk' => 1],
            ['ouvrage_id' => 2, 'titre' => '1984', 'extrait' => 'Un roman dystopique...', 'resume' => 'Histoire de la vie de Winston Smith...', 'annee' => 1949, 'image' => '1984.jpg', 'nbPages' => 328, 'utilisateur_fk' => 2, 'categorie_fk' => 2, 'editeur_fk' => 2, 'auteur_fk' => 2],
            ['ouvrage_id' => 3, 'titre' => 'Le Seigneur des Anneaux', 'extrait' => 'Une épopée fantastique...', 'resume' => 'L’histoire de la quête pour détruire l’anneau...', 'annee' => 1954, 'image' => 'Le_Seigneur_des_Anneaux.jpg', 'nbPages' => 1216, 'utilisateur_fk' => 3, 'categorie_fk' => 3, 'editeur_fk' => 3, 'auteur_fk' => 3],
            ['ouvrage_id' => 4, 'titre' => 'À la recherche du temps perdu', 'extrait' => 'Un roman de la mémoire...', 'resume' => 'Marcel Proust raconte l’histoire...', 'annee' => 1913, 'image' => 'temps.png', 'nbPages' => 1400, 'utilisateur_fk' => 3, 'categorie_fk' => 4, 'editeur_fk' => 4, 'auteur_fk' => 4],
            ['ouvrage_id' => 5, 'titre' => 'Le Comte de Monte-Cristo', 'extrait' => 'Un roman d’aventure...', 'resume' => 'L’histoire de vengeance d’Edmond Dantès...', 'annee' => 1844, 'image' => 'comte.jpg', 'nbPages' => 1240, 'utilisateur_fk' => 2, 'categorie_fk' => 5, 'editeur_fk' => 5, 'auteur_fk' => 5],
            ['ouvrage_id' => 6, 'titre' => 'Les Misérables', 'extrait' => 'Une épopée de la misère...', 'resume' => 'L’histoire de Jean Valjean et de la rédemption...', 'annee' => 1862, 'image' => 'miserables.jpg', 'nbPages' => 1464, 'utilisateur_fk' => 1, 'categorie_fk' => 1, 'editeur_fk' => 2, 'auteur_fk' => 6],
            ['ouvrage_id' => 7, 'titre' => 'L’Alchimiste', 'extrait' => 'Un conte philosophique...', 'resume' => 'L’histoire de Santiago et sa quête de trésor...', 'annee' => 1988, 'image' => 'alchimiste.jpg', 'nbPages' => 208, 'utilisateur_fk' => 1, 'categorie_fk' => 2, 'editeur_fk' => 3, 'auteur_fk' => 7],
            ['ouvrage_id' => 8, 'titre' => 'Le Vieil Homme et la Mer', 'extrait' => 'Une fable sur la persévérance...', 'resume' => 'Le combat entre un vieil homme et un marlin...', 'annee' => 1952, 'image' => 'Le_Vieil_Homme_et_la_Mer.jpg', 'nbPages' => 127, 'utilisateur_fk' => 1, 'categorie_fk' => 3, 'editeur_fk' => 4, 'auteur_fk' => 8],
            ['ouvrage_id' => 9, 'titre' => 'La Peste', 'extrait' => 'Une épidémie qui bouleverse...', 'resume' => 'Le récit de l’épidémie dans une ville...', 'annee' => 1947, 'image' => 'peste.jpg', 'nbPages' => 288, 'utilisateur_fk' => 1, 'categorie_fk' => 4, 'editeur_fk' => 5, 'auteur_fk' => 9],
            ['ouvrage_id' => 10, 'titre' => 'Les Fleurs du mal', 'extrait' => 'Un recueil de poèmes...', 'resume' => 'La lutte contre l’angoisse et la recherche de beauté...', 'annee' => 1857, 'image' => 'fleurs_du_mal.jpg', 'nbPages' => 140, 'utilisateur_fk' => 3, 'categorie_fk' => 5, 'editeur_fk' => 1, 'auteur_fk' => 10],
            ['ouvrage_id' => 11, 'titre' => 'Le Da Vinci Code', 'extrait' => 'Un thriller mystérieux...', 'resume' => 'La quête de Robert Langdon...', 'annee' => 2003, 'image' => 'davinci.jpg', 'nbPages' => 489, 'utilisateur_fk' => 2, 'categorie_fk' => 1, 'editeur_fk' => 2, 'auteur_fk' => 11],
            ['ouvrage_id' => 12, 'titre' => 'Orgueil et Préjugés', 'extrait' => 'Une romance classique...', 'resume' => 'Histoire d’Elizabeth Bennet et Mr Darcy...', 'annee' => 1813, 'image' => 'orgueil.jpg', 'nbPages' => 432, 'utilisateur_fk' => 2, 'categorie_fk' => 2, 'editeur_fk' => 3, 'auteur_fk' => 12],
            ['ouvrage_id' => 13, 'titre' => 'Le Journal d’Anne Frank', 'extrait' => 'Un témoignage de guerre...', 'resume' => 'Les mémoires d’Anne Frank durant la guerre...', 'annee' => 1947, 'image' => 'journal_anne_frank.jpg', 'nbPages' => 283, 'utilisateur_fk' => 1, 'categorie_fk' => 3, 'editeur_fk' => 4, 'auteur_fk' => 13],
            ['ouvrage_id' => 14, 'titre' => 'Le Horla', 'extrait' => 'Une nouvelle fantastique...', 'resume' => 'L’histoire d’un homme hanté par un être invisible...', 'annee' => 1887, 'image' => 'le_horla.jpg', 'nbPages' => 55, 'utilisateur_fk' => 1, 'categorie_fk' => 4, 'editeur_fk' => 5, 'auteur_fk' => 14],
            ['ouvrage_id' => 15, 'titre' => 'L’Étranger', 'extrait' => 'Un roman philosophique...', 'resume' => 'L’histoire de Meursault et de l’absurde...', 'annee' => 1942, 'image' => 'etranger.jpg', 'nbPages' => 123, 'utilisateur_fk' => 1, 'categorie_fk' => 5, 'editeur_fk' => 1, 'auteur_fk' => 15],
            ['ouvrage_id' => 16, 'titre' => 'Crime et Châtiment', 'extrait' => 'Un roman psychologique...', 'resume' => 'L’histoire de Raskolnikov et de son crime...', 'annee' => 1866, 'image' => 'crime_et_chatiment.jpg', 'nbPages' => 430, 'utilisateur_fk' => 1, 'categorie_fk' => 1, 'editeur_fk' => 2, 'auteur_fk' => 16],
            ['ouvrage_id' => 17, 'titre' => 'Le Petit Nicolas', 'extrait' => 'Une série de récits humoristiques...', 'resume' => 'Les aventures du Petit Nicolas...', 'annee' => 1959, 'image' => 'petit_nicolas.jpg', 'nbPages' => 192, 'utilisateur_fk' => 3, 'categorie_fk' => 2, 'editeur_fk' => 3, 'auteur_fk' => 17],
            ['ouvrage_id' => 18, 'titre' => 'Dracula', 'extrait' => 'Un roman gothique...', 'resume' => 'L’histoire du comte vampire et de ses victimes...', 'annee' => 1897, 'image' => 'dracula.jpg', 'nbPages' => 418, 'utilisateur_fk' => 3, 'categorie_fk' => 3, 'editeur_fk' => 4, 'auteur_fk' => 18],
            ['ouvrage_id' => 19, 'titre' => 'Le Parfum', 'extrait' => 'Un roman sur le pouvoir des odeurs...', 'resume' => 'L’histoire de Grenouille et de son parfum...', 'annee' => 1985, 'image' => 'parfum.jpg', 'nbPages' => 263, 'utilisateur_fk' => 2, 'categorie_fk' => 4, 'editeur_fk' => 5, 'auteur_fk' => 19],
            ['ouvrage_id' => 20, 'titre' => 'Mémoires d’une Geisha', 'extrait' => 'Une histoire fascinante...', 'resume' => 'La vie d’une geisha au Japon...', 'annee' => 1997, 'image' => 'memoires_geisha.jpg', 'nbPages' => 434, 'utilisateur_fk' => 1, 'categorie_fk' => 5, 'editeur_fk' => 1, 'auteur_fk' => 20],
        ]);
    }
}
