<?php

namespace Database\Factories;

use App\Models\MoyenTransport;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\moyen_transport>
 */
class MoyenTransportFactory extends Factory
{
    protected $model = MoyenTransport::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'type_trsp' => $this->faker->randomElement(['prive', 'public', 'autre']),
            'num_immat' => $this->faker->unique()->regexify('[A-Z0-9]{7}'),
            'marque' => $this->faker->company,
            'puissance_fiscale' => $this->faker->randomFloat(2, 50, 300), // Puissance fiscale aléatoire entre 50 et 300
        ];

    }
    }

