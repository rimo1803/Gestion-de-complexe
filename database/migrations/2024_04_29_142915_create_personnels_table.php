<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnelsTable extends Migration
{
    public function up()
    {
        Schema::create('personnels', function (Blueprint $table) {
            $table->id();
            $table->string('immat')->unique();
            $table->string('Nomper');
            $table->string('prenomper');
            $table->string('email');
            $table->string('password');
            $table->date('date_naissance');
            $table->string('photo_profil')->nullable();
            $table->string('grade',1);
            $table->string('CIN')->unique();
            $table->date('date_affectation');
            $table->string('diplome');
            $table->string('lieu_naissance');
            $table->enum('role', ['personnel', 'directeur'])->default('personnel');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('personnels');
    }
}
