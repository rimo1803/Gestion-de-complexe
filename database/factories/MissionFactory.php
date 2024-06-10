<?php

namespace Database\Factories;

use App\Models\Mission;
use App\Models\MoyenTransport;
use App\Models\Personnel;
use Illuminate\Database\Eloquent\Factories\Factory;

class MissionFactory extends Factory
{
    protected $model = Mission::class;

    public function definition()
    {
        return [
            'date_debut_mission' => $this->faker->date(),
            'date_fin_mission' => $this->faker->date(),
            'heure_debut' => $this->faker->time(),
            'heure_fin' => $this->faker->time(),
            'destination' => $this->faker->address,
            'objet' => $this->faker->sentence,
            'immat_pers' => $this->faker->regexify('[A-Z0-9]{6}'),
            'personnel_id' => Personnel::factory(),
            'moyen_transport_id' => MoyenTransport::factory(),
        ];
    }
}
