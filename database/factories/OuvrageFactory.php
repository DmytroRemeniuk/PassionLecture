<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ouvrage>
 */
class OuvrageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre' => $this->faker->sentence(),
            'extrait' => $this->faker->word(),
            'resume' => $this->faker->paragraph(),
            'annee' => $this->faker->year(),
            'image' => $this->faker->imageUrl(),
            'nbPages' => $this->faker->randomDigit(),
            'utilisateur_fk' => $this->faker->numberBetween(1, 10),
            'categorie_fk' => $this->faker->numberBetween(1, 10),
            'editeur_fk' => $this->faker->numberBetween(1, 10),
            'auteur_fk' => $this->faker->numberBetween(1, 10),
        ];
    }
}
