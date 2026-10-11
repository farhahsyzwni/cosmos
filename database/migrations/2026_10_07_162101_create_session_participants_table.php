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
        Schema::create('session_participants', function (Blueprint $table) {
            $table->increments('participant_id');
            $table->unsignedInteger('session_id');
            $table->unsignedInteger('user_id');
            $table->timestamp('joined_at')->nullable();

            $table->foreign('session_id')->references('session_id')->on('sessions');
            $table->foreign('user_id')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('session_participants');
    }
};
