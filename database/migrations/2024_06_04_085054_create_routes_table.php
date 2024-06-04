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
        Schema::create('routes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('world_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->smallinteger('from');
            $table->integer('wood');
            $table->integer('clay');
            $table->integer('iron');
            $table->integer('crop');
            $table->tinyinteger('start');
            $table->tinyinteger('deliveries');
            $table->mediuminteger('merchant');
            $table->integer('timestamp');

            $table->foreign('world_id')->references('id')->on('worlds');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
};
