<?php

namespace Database\Factories;

use App\Models\Attestation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\attestation>
 */
class AttestationFactory extends Factory
{
    protected $model = Attestation::class;

    public function definition(): array
    {
        return [
            'description' => $this->faker->sentence,
            'type_attestation' => $this->faker->randomElement(['travail', 'salaire']),
            'date_edition' => $this->faker->date(),
            'reference' => $this->faker->uuid,
            'immat_per' => function () {
                // Sélectionne une immatriculation aléatoire parmi les personnels existants
                return \App\Models\Personnel::all()->random()->immat;
            },
        ];
    }
}
