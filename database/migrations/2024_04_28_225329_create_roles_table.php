<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Role; // Assurez-vous d'importer le modèle Role

class CreateRolesTable extends Migration
{
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

  
        Role::create(['name' => 'directeur']);
        Role::create(['name' => 'formateur']);

    }

    public function down()
    {
        Schema::dropIfExists('roles');
    }

    public static function getRoleId($roleName)
    {
        $role = Role::where('name', $roleName)->first();
        return $role ? $role->id : null;
    }
}
