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
            $table->foreignId('personnel_id')->constrained()->onDelete('cascade');
            $table->foreignId('role_id')->constrained()->onDelete('cascade');


            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('personnel_role');
    }
}
