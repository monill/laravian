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
        Schema::create('abdata', function (Blueprint $table) {
            $table->unsignedBigInteger('world_id')->index();

            $table->tinyInteger('a1')->default(0);
            $table->tinyInteger('a2')->default(0);
            $table->tinyInteger('a3')->default(0);
            $table->tinyInteger('a4')->default(0);
            $table->tinyInteger('a5')->default(0);
            $table->tinyInteger('a6')->default(0);
            $table->tinyInteger('a7')->default(0);
            $table->tinyInteger('a8')->default(0);
            $table->tinyInteger('a9')->default(0);
            $table->tinyInteger('a10')->default(0);

            $table->tinyInteger('b1')->default(0);
            $table->tinyInteger('b2')->default(0);
            $table->tinyInteger('b3')->default(0);
            $table->tinyInteger('b4')->default(0);
            $table->tinyInteger('b5')->default(0);
            $table->tinyInteger('b6')->default(0);
            $table->tinyInteger('b7')->default(0);
            $table->tinyInteger('b8')->default(0);
            $table->tinyInteger('b9')->default(0);
            $table->tinyInteger('b10')->default(0);

            $table->foreign('world_id')->references('id')->on('worlds');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abdata');
    }
};
