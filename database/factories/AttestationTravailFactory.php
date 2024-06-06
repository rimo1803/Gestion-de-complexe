<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Attestation;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AttestationTravail>
 */
class AttestationTravailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'attestation_id' => function () {
                return Attestation::factory()->create()->id;
            },
            'position' => $this->faker->jobTitle,
            'department' => $this->faker->word,
            'date_start' => $this->faker->date(),
            'date_end' => $this->faker->optional()->date(),
        ];

    }
}
