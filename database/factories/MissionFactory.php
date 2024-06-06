<?php

namespace Database\Factories;

use App\Models\personnel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\mission>
 */
class MissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date_debut_mission' => $this->faker->date(),
            'date_fin_mission' => $this->faker->date(),
            'heure_debut' => $this->faker->time(),
            'heure_fin' => $this->faker->time(),
            'destination' => $this->faker->address,
            'objet' => $this->faker->sentence,
            'immat_pers' => function () {
                // Sélectionner une immatriculation aléatoire parmi les personnels existants
                return personnel::all()->random()->immat;
            },
        ];
    }
}
