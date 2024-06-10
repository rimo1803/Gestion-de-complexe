<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mission;
use App\Models\Personnel;
use App\Models\MoyenTransport;

class MissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $moyenTransports = MoyenTransport::all();
        Personnel::where('role', 'personnel')->get()->each(function ($personnel) use ($moyenTransports) {
            $personnel->missions()->saveMany(Mission::factory()->count(3)->make([
                'moyen_transport_id' => $moyenTransports->random()->id,
            ]));
        });
    }
}
