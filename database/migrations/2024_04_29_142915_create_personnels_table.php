<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personnels', function (Blueprint $table) {
            $table->id();
            $table->string('immat')->unique();
            $table->string('Nomper');
            $table->string('prenomper');
            $table->date('date_naissance');
            $table->string('photo_profil')->nullable();
            $table->string('grade',1);
            $table->string('CIN')->unique();
            $table->date('date_affectation');
            $table->string('diplome');
            $table->string('lieu_naissance');
            $table->timestamps();

            $table->unsignedBigInteger('fonction_id');
            $table->foreign('fonction_id')->references('id')->on('fonctions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personnels');
    }
};
