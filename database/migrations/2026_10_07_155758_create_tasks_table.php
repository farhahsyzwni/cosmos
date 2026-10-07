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
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('task_id');
            $table->unsignedInteger('list_id');
            $table->string('task_name', 255);
            $table->date('due_date')->nullable();
            $table->enum('status', ['Pending', 'Completed'])->default('Pending');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('completed_at')->nullable();

            $table->foreign('list_id')->references('list_id')->on('task_lists');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
