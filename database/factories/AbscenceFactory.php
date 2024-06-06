<?php

namespace Database\Factories;

use App\Models\Abscence;
use Illuminate\Database\Eloquent\Factories\Factory;

class AbscenceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Abscence::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date_debut' => $this->faker->date(),
            'date_fin' => $this->faker->date(),
            'type_abscence' => $this->faker->randomElement(['justifiée', 'non justifiée']),
            'justification' => $this->faker->sentence(),
            'immat_per' => function () {
                // Suppose que vous avez des personnels existants dans votre base de données
                return \App\Models\Personnel::inRandomOrder()->first()->immat;
            },
        ];
    }
}
