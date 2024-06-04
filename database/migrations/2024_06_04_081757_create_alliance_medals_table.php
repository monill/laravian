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
        Schema::create('alliance_medals', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('alliance_id')->index();

            $table->smallinteger('category');
            $table->smallinteger('place');
            $table->smallinteger('week');
            $table->biginteger('points');
            $table->string('image', 20);

            $table->foreign('alliance_id')->references('id')->on('alliances');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alliance_medals');
    }
};
