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
        Schema::create('alliance_permissions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('alliance_id')->index();
            $table->unsignedBigInteger('user_id')->index();

            $table->string('rank', 20);
            $table->integer('opt1')->default(0);
            $table->integer('opt2')->default(0);
            $table->integer('opt3')->default(0);
            $table->integer('opt4')->default(0);
            $table->integer('opt5')->default(0);
            $table->integer('opt6')->default(0);
            $table->integer('opt7')->default(0);
            $table->integer('opt8')->default(0);

            $table->foreign('alliance_id')->references('id')->on('alliances');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alliance_permissions');
    }
};
