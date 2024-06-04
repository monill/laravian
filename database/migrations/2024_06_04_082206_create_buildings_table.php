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
        Schema::create('buildings', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('world_id')->index();

            $table->tinyinteger('field');
            $table->tinyinteger('type');
            $table->tinyinteger('loop_con');
            $table->tinyinteger('master');
            $table->tinyinteger('level');
            $table->integer('timestamp');

            $table->foreign('world_id')->references('id')->on('worlds');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buildings');
    }
};
