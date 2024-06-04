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
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('world_id')->index();

            $table->tinyinteger('unit');
            $table->tinyinteger('pop');
            $table->smallinteger('each_time');
            $table->integer('amt');
            $table->integer('timestamp');
            $table->integer('commence');
            $table->integer('end_at');

            $table->foreign('world_id')->references('id')->on('worlds');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainings');
    }
};
