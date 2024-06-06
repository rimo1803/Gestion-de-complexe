<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\conge;
use App\Models\organisme;
use App\Models\personnel;
use App\Models\moyenTransport;
use App\Models\Abscence;
use App\Models\Attestation;
use App\Models\Mission;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Création du rôle "directeur" s'il n'existe pas déjà
    Role::firstOrCreate(['name' => 'directeur']);

    // Création du rôle "personnel" s'il n'existe pas déjà
    Role::firstOrCreate(['name' => 'personnel']);

        // Seed pour la table 'personnels'
        personnel::factory()->count(20)->create();

        // Seed pour la table 'moyen_transports'
        MoyenTransport::factory()->count(10)->create();

        // Seed pour la table 'organismes'
        organisme::factory()->count(10)->create();

        // Seed pour la table 'attestations'
        Attestation::factory()->count(30)->create();

        // Seed pour la table 'abscences'
        Abscence::factory()->count(50)->create();

        // Seed pour la table 'conges'
        conge::factory()->count(30)->create();

        // Seed pour la table 'missions'
        Mission::factory()->count(20)->create();

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
