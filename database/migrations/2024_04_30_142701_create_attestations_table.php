<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttestationsTable extends Migration
{
    public function up()
    {
        Schema::create('attestations', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->string('type_attestation'); // 'travail' ou 'salaire'
            $table->date('date_edition');
            $table->string('reference');
            $table->timestamps();
            $table->string('immat_per');
            $table->foreign('immat_per')->references('immat')->on('personnels');
        });
    }

    public function down()
    {
        Schema::dropIfExists('attestations');
    }
}
