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
        Schema::create('personnel_missions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mission_id');
            $table->string('personnel_id');
            $table->timestamps();

            $table->foreign('mission_id')->references('id')->on('missions')->onDelete('cascade');
            $table->foreign('personnel_id')->references('immat')->on('personnels')->onDelete('cascade');

            $table->unique(['mission_id', 'personnel_id']);

            $table->unsignedBigInteger('moyen_transport_id')->nullable();
            $table->foreign('moyen_transport_id')->references('id')->on('moyen_transports')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personnel_missions');
    }
};
