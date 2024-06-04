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
        Schema::create('attacks', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('world_id')->index();

            $table->integer('t1');
            $table->integer('t2');
            $table->integer('t3');
            $table->integer('t4');
            $table->integer('t5');
            $table->integer('t6');
            $table->integer('t7');
            $table->integer('t8');
            $table->integer('t9');
            $table->integer('t10');
            $table->integer('t11');
            $table->tinyinteger('attack_type');
            $table->tinyinteger('ctar1');
            $table->tinyinteger('ctar2');
            $table->tinyinteger('spy');

            $table->foreign('world_id')->references('id')->on('worlds');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attacks');
    }
};
