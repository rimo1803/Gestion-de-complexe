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
        Schema::create('attestations_salaire', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attestation_id');
            $table->decimal('salary', 8, 2);
            $table->string('currency');
            $table->date('salary_date');
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
        Schema::dropIfExists('attestations_salaire');

    }
};
