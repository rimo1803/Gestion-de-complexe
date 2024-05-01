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
        Schema::create('organismes', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('nom_organisme');
            $table->unsignedBigInteger('telephone');
            $table->string('code');
            $table->string('email')->unique;
            $table->unsignedBigInteger('fax');
            $table->string('adresse');
            $table->timestamps();
            $table->unsignedBigInteger('complexe_id');
            $table->foreign('complexe_id')->references('id')->on('complexes');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organismes');
    }
};
