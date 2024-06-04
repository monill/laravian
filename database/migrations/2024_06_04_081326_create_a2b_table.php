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
        Schema::create('a2b', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('to_world_id')->index();

            $table->string('ckey');
            $table->smallinteger('type');

            $table->integer('u1');
            $table->integer('u2');
            $table->integer('u3');
            $table->integer('u4');
            $table->integer('u5');
            $table->integer('u6');
            $table->integer('u7');
            $table->integer('u8');
            $table->integer('u9');
            $table->integer('u10');
            $table->integer('u11');
            $table->integer('time_check')->default(0);

            $table->foreign('to_world_id')->references('id')->on('worlds');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('a2b');
    }
};
