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
        Schema::create('moyen_transports', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('type_trsp');
            $table->string('num_immat');
            $table->string('marque');
            $table->float('puissance_fiscale');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moyen_transports');
    }
};
