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
        Schema::create('attestation_travails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attestation_id')->constrained()->onDelete('cascade');
            $table->string('position');
            $table->string('department');
            $table->date('date_start');
            $table->date('date_end')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attestation_travails');
    }
};
