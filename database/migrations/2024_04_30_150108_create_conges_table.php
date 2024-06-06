<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCongesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('conges', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('date_debut');
            $table->date('date_fin');
            $table->string('decision_conge')->nullable(); // Chemin du fichier de décision
            $table->string('status')->default('en attente');
            $table->integer('reliquat');
            $table->string('remplacement');
            $table->string('immat_per');
            $table->foreign('immat_per')->references('immat')->on('personnels');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conges');
    }
};
