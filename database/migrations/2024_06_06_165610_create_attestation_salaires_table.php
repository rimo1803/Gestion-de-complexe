<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('attestation_salaires', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attestation_id')->constrained()->onDelete('cascade');
            $table->decimal('salary', 8, 2);
            $table->string('currency');
            $table->date('salary_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attestation_salaires');
    }
};
