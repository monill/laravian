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
        Schema::create('demolitions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('world_id')->index();

            $table->smallinteger('build_number')->default(0);
            $table->tinyinteger('lvl')->default(0);
            $table->integer('time_to_finish');

            $table->foreign('world_id')->references('id')->on('worlds');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demolitions');
    }
};
