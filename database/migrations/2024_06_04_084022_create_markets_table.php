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
        Schema::create('markets', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('world_id')->index();

            $table->tinyinteger('gtype');
            $table->integer('gamt');
            $table->tinyinteger('wtype');
            $table->integer('wamt');
            $table->tinyinteger('accept');
            $table->integer('max_time');
            $table->integer('alliance');
            $table->tinyinteger('merchant');

            $table->foreign('world_id')->references('id')->on('worlds');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('markets');
    }
};
