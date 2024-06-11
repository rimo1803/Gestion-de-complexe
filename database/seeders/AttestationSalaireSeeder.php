<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\AttestationSalaire;
use App\Models\Attestation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AttestationSalaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $date = Carbon::now()->toDateString();
        $attestations = Attestation::where('type_attestation', 'salaire')->get();

        foreach ($attestations as $attestation) {
            AttestationSalaire::create([
                'attestation_id' => $attestation->id,
                'salary' => 1000 ,
                'currency' => 'USD',
                'salary_date' => $date,
                'document' => 'en_attente'
            ]);
        }
    }
}
