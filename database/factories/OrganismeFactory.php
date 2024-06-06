<?php

namespace Database\Factories;

use App\Models\organisme;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\organisme>
 */
class OrganismeFactory extends Factory
{
    protected $model = organisme::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nom_organisme' => $this->faker->company,
            'telephone' => $this->faker->phoneNumber,
            'code' => $this->faker->unique()->regexify('[A-Z0-9]{5}'),
            'email' => $this->faker->unique()->safeEmail,
            'fax' => $this->faker->phoneNumber,
            'adresse' => $this->faker->address,
        ];
    }
}
