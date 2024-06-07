<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('notifications', function (Blueprint $table) {
            //
            $table->timestamp('read_at')->nullable()->after('data');
            $table->unsignedBigInteger('notifiable_id')->after('read_at');
            $table->string('notifiable_type')->after('notifiable_id');
        });
    }

    /**
     * Reverse the migrations.
     */
   
};
