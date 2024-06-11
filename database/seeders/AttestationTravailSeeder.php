<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Attestation;
use Illuminate\Database\Seeder;
use App\Models\AttestationTravail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AttestationTravailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $date = Carbon::now()->toDateString();
        $attestations = Attestation::where('type_attestation', 'travail')->get();
        foreach ($attestations as $attestation) {
            AttestationTravail::create([
                'attestation_id' => $attestation->id,
                'position' => 'Position ' . $attestation->personnel_id,
                'department' => 'Department ' . $attestation->personnel_id,
                'date_start' => $date,
                'date_end' => $date,
                'document' => 'en_attente'
            ]);
        }
    }
}
