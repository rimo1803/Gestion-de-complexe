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
        Schema::create('organisme_personnel', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('organisme_id');
            $table->unsignedBigInteger('personnel_id');
            $table->timestamps();

            $table->foreign('organisme_id')->references('id')->on('organismes')->onDelete('cascade');
            $table->foreign('personnel_id')->references('id')->on('personnels')->onDelete('cascade');

            $table->unique(['organisme_id', 'personnel_id']);
        });
    }
};
