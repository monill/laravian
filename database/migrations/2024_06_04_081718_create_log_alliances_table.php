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
        Schema::create('log_alliances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alliance_id')->index();;

            $table->string('comment');
            $table->integer('date');

            $table->foreign('alliance_id')->references('id')->on('alliances');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_alliances');
    }
};
