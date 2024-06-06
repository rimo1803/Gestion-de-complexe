<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnelRoleTable extends Migration
{
    public function up()
    {
        Schema::create('personnel_role', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personnel_id');
            $table->unsignedBigInteger('role_id');
            $table->timestamps();
            // Clés étrangères
            $table->foreign('personnel_id')->references('id')->on('personnels')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            // Clé primaire composite
            $table->unique(['personnel_id', 'role_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personnel_role');
    }
}
