<?php

namespace Database\Factories;

use App\Models\AttestationTravail;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AttestationTravail>
 */
class AttestationTravailFactory extends Factory
{
    protected $model = AttestationTravail::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'attestation_id' => function () {
                return factory(\App\Models\Attestation::class)->create()->id;
            },
            'position' => $this->faker->jobTitle,
            'department' => $this->faker->word,
            'date_start' => $this->faker->date(),
            'date_end' => $this->faker->optional()->date(),
        ];
    }
}
