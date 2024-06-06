<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoyenTransportsTable extends Migration
{
    public function up()
    {
        Schema::create('moyen_transports', function (Blueprint $table) {
            $table->id();
            $table->string('type_trsp');
            $table->string('num_immat');
            $table->string('marque');
            $table->float('puissance_fiscale');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('moyen_transports');
    }
}
