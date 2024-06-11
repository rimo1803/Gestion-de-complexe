<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Abscence;
use App\Models\Attestation;
use App\Models\AttestationSalaire;
use App\Models\AttestationTravail;
use App\Models\conge;
use App\Models\mission;
use App\Models\MoyenTransport;
use App\Models\organisme;
use App\Models\personnel;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    // public function run(): void
    // {
    //      // Seed pour la table 'personnels'
    //      \App\Models\Personnel::factory()->count(18)->create();

    //      // Création des deux directeurs
    //      \App\Models\Personnel::factory()->create(['role' => 'directeur']);
    //      \App\Models\Personnel::factory()->create(['role' => 'directeur']);

    //      // Seed pour la table 'moyen_transports'
    //      \App\Models\MoyenTransport::factory()->count(5)->create();

    //      // Seed pour la table 'organismes'
    //      \App\Models\Organisme::factory()->count(10)->create();

    //      // Seed pour la table 'abscences' pour les personnels
    //      \App\Models\Personnel::where('role', 'personnel')->get()->each(function ($personnel) {
    //          $personnel->absences()->saveMany(Abscence::factory()->count(3)->make());
    //      });

    //      // Seed pour la table 'conges' pour les personnels
    //      \App\Models\Personnel::where('role', 'personnel')->get()->each(function ($personnel) {
    //          $personnel->conges()->saveMany(Conge::factory()->count(2)->make());
    //      });

    //      // Seed pour la table 'missions' pour les personnels
    //      \App\Models\Personnel::where('role', 'personnel')->get()->each(function ($personnel) {
    //          $personnel->missions()->saveMany(Mission::factory()->count(3)->make());
    //      });

    //      // Seed pour la table 'attestations' pour les personnels
    //      \App\Models\Personnel::where('role', 'personnel')->get()->each(function ($personnel) {
    //          $personnel->attestations()->saveMany(Attestation::factory()->count(5)->make());
    //      });

    //      // Seed pour la table 'attestations' pour les personnels avec personnel_id aléatoire
    //      Attestation::factory()->count(30)->create([
    //          'personnel_id' => function () {
    //              // Sélectionne un ID de personnel aléatoire parmi les existants
    //              return \App\Models\Personnel::all()->random()->id;
    //          },
    //      ]);

    //      // Seed pour la table 'attestations_salaire'
    //      \App\Models\AttestationSalaire::factory()->count(10)->create();

    //      // Seed pour la table 'attestations_travail'
    //      \App\Models\AttestationTravail::factory()->count(10)->create();
    //  }
    public function run()
    {
        $this->call([
            AttestationSeeder::class,
            AttestationTravailSeeder::class,
            AttestationSalaireSeeder::class,
        ]);
    }
 }
