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
        Schema::create('technologies', function (Blueprint $table) {
            $table->unsignedBigInteger('world_id')->index();

            $table->tinyInteger('t2')->default(0);
            $table->tinyInteger('t3')->default(0);
            $table->tinyInteger('t4')->default(0);
            $table->tinyInteger('t5')->default(0);
            $table->tinyInteger('t6')->default(0);
            $table->tinyInteger('t7')->default(0);
            $table->tinyInteger('t8')->default(0);
            $table->tinyInteger('t9')->default(0);

            $table->tinyInteger('t12')->default(0);
            $table->tinyInteger('t13')->default(0);
            $table->tinyInteger('t14')->default(0);
            $table->tinyInteger('t15')->default(0);
            $table->tinyInteger('t16')->default(0);
            $table->tinyInteger('t17')->default(0);
            $table->tinyInteger('t18')->default(0);
            $table->tinyInteger('t19')->default(0);

            $table->tinyInteger('t22')->default(0);
            $table->tinyInteger('t23')->default(0);
            $table->tinyInteger('t24')->default(0);
            $table->tinyInteger('t25')->default(0);
            $table->tinyInteger('t26')->default(0);
            $table->tinyInteger('t27')->default(0);
            $table->tinyInteger('t28')->default(0);
            $table->tinyInteger('t29')->default(0);

            $table->tinyInteger('t32')->default(0);
            $table->tinyInteger('t33')->default(0);
            $table->tinyInteger('t34')->default(0);
            $table->tinyInteger('t35')->default(0);
            $table->tinyInteger('t36')->default(0);
            $table->tinyInteger('t37')->default(0);
            $table->tinyInteger('t38')->default(0);
            $table->tinyInteger('t39')->default(0);

            $table->tinyInteger('t42')->default(0);
            $table->tinyInteger('t43')->default(0);
            $table->tinyInteger('t44')->default(0);
            $table->tinyInteger('t45')->default(0);
            $table->tinyInteger('t46')->default(0);
            $table->tinyInteger('t47')->default(0);
            $table->tinyInteger('t48')->default(0);
            $table->tinyInteger('t49')->default(0);

            $table->foreign('world_id')->references('id')->on('worlds');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technologies');
    }
};
