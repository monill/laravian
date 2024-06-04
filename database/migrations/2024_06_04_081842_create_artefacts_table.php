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
        Schema::create('artefacts', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('world_id')->index();

            $table->smallinteger('owner');
            $table->tinyinteger('type');
            $table->tinyinteger('size');
            $table->tinyinteger('status');
            $table->integer('conquered');
            $table->string('name');
            $table->string('desc');
            $table->string('img');
            $table->integer('effect_type');
            $table->double('effect');
            $table->integer('aoe');
            $table->integer('last_update');

            $table->foreign('world_id')->references('id')->on('worlds');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artefacts');
    }
};
