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
        Schema::create('oases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('world_id')->index();
            $table->unsignedBigInteger('user_id')->index();

            $table->tinyInteger('type');
            $table->boolean('conquered')->default(0);

            $table->integer('wood');
            $table->integer('iron');
            $table->integer('clay');
            $table->integer('crop');

            $table->integer('wood_production')->nullable();
            $table->integer('iron_production')->nullable();
            $table->integer('clay_production')->nullable();
            $table->integer('crop_production')->nullable();

            $table->mediumInteger('max_storage');
            $table->mediumInteger('max_crop');

            $table->tinyInteger('loyalty')->default(100);

            $table->integer('last_train')->unsigned();
            $table->integer('last_farmed')->unsigned();
            $table->integer('last_updated')->unsigned();
            $table->string('name',45)->default('Unoccupied Oasis');

            $table->foreign('world_id')->references('id')->on('worlds');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oases');
    }
};
