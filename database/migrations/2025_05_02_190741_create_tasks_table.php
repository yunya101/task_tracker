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
            $table->id();
            $table->string('title');
            $table->string('description', 500)->nullable();
            $table->timestamp('deadline');
            $table->boolean('is_completed')->default(false);
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('executor')->nullable();
            $table->smallInteger('count_comments')->default(0);

            $table->foreign('group_id')->references('id')->on('groups');
            $table->foreign('executor')->references('id')->on('users');
            
            $table->timestamps();
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
