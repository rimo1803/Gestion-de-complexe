<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('missions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('date_debut_mission');
            $table->date('date_fin_mission');
            $table->time('heure_debut');
            $table->time('heure_fin');
            $table->string('destination');
            $table->string('objet');
            $table->string('immat_pers');
            $table->foreignId('personnel_id')->constrained('personnels');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('missions');
    }
};
