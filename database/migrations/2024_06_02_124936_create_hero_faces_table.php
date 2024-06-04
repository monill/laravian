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
        Schema::create('hero_faces', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->index();

            $table->tinyInteger('gender')->nullable();

            $table->tinyInteger('beard')->nullable(false);
            $table->tinyInteger('ear')->nullable(false);
            $table->tinyInteger('eye')->nullable(false);
            $table->tinyInteger('eyebrow')->nullable(false);
            $table->tinyInteger('face')->nullable(false);
            $table->tinyInteger('hair')->nullable(false);
            $table->tinyInteger('mouth')->nullable(false);
            $table->tinyInteger('nose')->nullable(false);
            $table->tinyInteger('color')->nullable(false);

            $table->tinyInteger('foot')->nullable();
            $table->smallInteger('helmet')->nullable();
            $table->smallInteger('body')->nullable();
            $table->smallInteger('shoes')->nullable();
            $table->smallInteger('horse')->nullable();
            $table->smallInteger('left_hand')->nullable();
            $table->smallInteger('right_hand')->nullable();
            $table->smallInteger('bag')->nullable();
            $table->smallInteger('num')->nullable();
//            $table->string('hash')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_faces');
    }
};
