<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToAttestationsTable extends Migration
{
    public function up()
    {
        Schema::table('attestations', function (Blueprint $table) {
            $table->string('status', 50)->default('en_attente')->after('document');
        });
    }

    public function down()
    {
        Schema::table('attestations', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
