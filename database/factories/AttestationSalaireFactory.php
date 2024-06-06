<?php

namespace Database\Factories;

use App\Models\AttestationSalaire;
use App\Models\Attestation;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttestationSalaireFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AttestationSalaire::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'attestation_id' => function () {
                return Attestation::factory()->create()->id;
            },
            'salary' => $this->faker->randomFloat(2, 1000, 5000),
            'currency' => $this->faker->currencyCode,
            'salary_date' => $this->faker->date(),
        ];
    }
}
