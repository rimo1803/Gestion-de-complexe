<?php

namespace Database\Factories;

use App\Models\AttestationSalaire;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AttestationSalaire>
 */
class AttestationSalaireFactory extends Factory
{
    protected $model = AttestationSalaire::class;

    public function definition(): array
    {
        return [
            'attestation_id' => function () {
                return factory(\App\Models\Attestation::class)->create()->id;
            },
            'salary' => $this->faker->randomFloat(2, 1000, 5000),
            'currency' => $this->faker->currencyCode,
            'salary_date' => $this->faker->date(),
        ];
    }
}
