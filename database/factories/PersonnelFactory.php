<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\personnel>
 */
class PersonnelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Nomper' => $this->faker->lastName,
            'prenomper' => $this->faker->firstName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'),
            'immat' => $this->faker->unique()->regexify('[A-Z0-9]{6}'),
            'date_naissance' => $this->faker->date(),
            'photo_profil' => 'https://picsum.photos/200', // URL d'une image aléatoire de Lorem Picsum (taille 200x200)
            'grade' => $this->faker->randomLetter,
            'CIN' => $this->faker->unique()->regexify('[0-9]{8}'),
            'date_affectation' => $this->faker->date(),
            'diplome' => $this->faker->word,
            'lieu_naissance' => $this->faker->city,
            'role' => $this->faker->randomElement(['personnel', 'directeur']),
        ];
    }
}
