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
        Schema::table('moyen_transports', function (Blueprint $table) {
            $table->foreignId('mission_id')->constrained('missions')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('moyen_transports', function (Blueprint $table) {
            $table->dropForeign(['mission_id']);
            $table->dropColumn('mission_id');
        });
    }

};
