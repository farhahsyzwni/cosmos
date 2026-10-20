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
        Schema::create('sessions', function (Blueprint $table) {
            $table->increments('session_id');
            $table->unsignedInteger('host_id');
            $table->string('session_title', 100);
            $table->string('session_token', 50)->unique();
            $table->enum('session_type', ['Private', 'Collaborative']);
            $table->integer('focus_duration');
            $table->integer('short_break');
            $table->integer('long_break');
            $table->enum('session_status', ['Active', 'Ended'])->default('Active');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('ended_at')->nullable();

            $table->foreign('host_id')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
