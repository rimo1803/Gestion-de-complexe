<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Attestation;

class AttestationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $date = Carbon::now()->toDateString();
        for ($i = 1; $i <= 20; $i++) {
            Attestation::create([
                'description' => 'Description ' . $i,
                'type_attestation' => $i % 2 == 0 ? 'salaire' : 'travail',
                'date_edition' => null,
                'reference' => 'REF' . $i,
                'personnel_id' => $i,
                'document' => 'en_attente'
            ]);
        }

    }
}
