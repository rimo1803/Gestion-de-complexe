<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganismesTable extends Migration
{
    public function up()
    {
        Schema::create('organismes', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('nom_organisme');
            $table->string('telephone');
            $table->string('code');
            $table->string('email')->unique();
            $table->string('fax');
            $table->string('adresse');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('organismes');
    }
}
