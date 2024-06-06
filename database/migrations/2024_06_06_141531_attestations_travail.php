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
        //
        Schema::create('attestations_travail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attestation_id');
            $table->string('position');
            $table->string('department');
            $table->date('date_start');
            $table->date('date_end')->nullable();
            $table->timestamps();

            $table->foreign('attestation_id')->references('id')->on('attestations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('attestations_travail');
    }
};
