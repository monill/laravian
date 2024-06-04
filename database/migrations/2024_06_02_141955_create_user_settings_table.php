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
        Schema::create('user_settings', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->index();

            $table->tinyinteger('sitter1_set_1')->nullable();
            $table->tinyinteger('sitter1_set_2')->nullable();
            $table->tinyinteger('sitter1_set_3')->nullable();
            $table->tinyinteger('sitter1_set_4')->nullable();
            $table->tinyinteger('sitter1_set_5')->nullable();
            $table->tinyinteger('sitter1_set_6')->nullable();
            $table->tinyinteger('sitter2_set_1')->nullable();
            $table->tinyinteger('sitter2_set_2')->nullable();
            $table->tinyinteger('sitter2_set_3')->nullable();
            $table->tinyinteger('sitter2_set_4')->nullable();
            $table->tinyinteger('sitter2_set_5')->nullable();
            $table->tinyinteger('sitter2_set_6')->nullable();
            $table->tinyinteger('nopicn')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_settings');
    }
};
