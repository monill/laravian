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
        Schema::create('notices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();

            $table->smallinteger('to_world_id')->nullable(false);
            $table->smallinteger('ally')->nullable(false);
            $table->tinyinteger('type')->nullable(false);
            $table->string('topic')->nullable(false);
            $table->string('data')->nullable(false);

            $table->boolean('viewed')->nullable(false);
            $table->boolean('archive')->nullable(false);

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notices');
    }
};
