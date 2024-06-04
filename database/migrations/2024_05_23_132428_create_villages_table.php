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
        Schema::create('villages', function (Blueprint $table) {
            $table->unsignedBigInteger('world_id')->index();
            $table->unsignedBigInteger('user_id')->index();

            $table->string('name',45);
            $table->boolean('is_capital')->default(0);
            $table->smallInteger('population')->default(0);
            $table->smallInteger('culture_points');
            $table->tinyInteger('evasion')->nullable();
            $table->integer('celebration')->default(0);
            $table->integer('type')->default(0);

            $table->integer('wood');
            $table->integer('clay');
            $table->integer('iron');
            $table->integer('crop');

            $table->integer('wood_production')->nullable();
            $table->integer('clay_production')->nullable();
            $table->integer('iron_production')->nullable();
            $table->integer('crop_production')->nullable();

            $table->integer('max_storage')->default(0);
            $table->integer('max_crop')->default(0);
            $table->integer('extra_max_storage')->nullable();
            $table->integer('extra_max_crop')->nullable();
            $table->integer('upkeep')->nullable();
            $table->tinyInteger('loyalty')->default(100);
            $table->smallInteger('exp1')->nullable();
            $table->smallInteger('exp2')->nullable();
            $table->smallInteger('exp3')->nullable();
            $table->boolean('natar')->default(0);
            $table->integer('starv')->nullable();
            $table->smallInteger('expandedfrom')->nullable();
//            $table->integer('created');
//            $table->integer('lastupdate');

            $table->timestamps();

            $table->foreign('world_id')->references('id')->on('worlds');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('villages');
    }
};
