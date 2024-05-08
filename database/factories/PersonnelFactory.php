<?php

namespace Database\Factories;

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
            //
            'name'=>$this->faker->name(),
            'email'=>$this->faker->email(),
            'phone'=>$this->faker->phoneNumber(),
            'role'=>$this->faker->randomElement(['admin','personnel']),
            'password'=>bcrypt('password'),
            
        ];
    }
}
