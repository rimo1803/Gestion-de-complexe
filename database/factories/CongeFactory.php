<?php

namespace Database\Factories;

use App\Models\conge;
use App\Models\personnel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\conge>
 */
class CongeFactory extends Factory
{
    protected $model = conge::class;

    public function definition()
    {
        // Générer une date de début et une date de fin aléatoires dans les prochains mois
        $dateDebut = $this->faker->dateTimeBetween('now', '+6 months');
        $dateFin = $this->faker->dateTimeBetween($dateDebut, '+6 months');

        return [
            'date_debut' => $dateDebut,
            'date_fin' => $dateFin,
            'decision_conge' => $this->faker->randomElement(['accepte', 'refuse']),
            'status' => $this->faker->randomElement(['en_attente','accepte', 'refuse']),
            'reliquat' => $this->faker->numberBetween(1, 50), // Par exemple, un nombre aléatoire entre 1 et 30
            'remplacement' => $this->faker->name, // Vous pouvez ajuster selon vos besoins
            'immat_per' => function () {
                // Sélectionne une immatriculation aléatoire parmi les personnels existants
                return personnel::all()->random()->immat;
            },
        ];
    }
}
