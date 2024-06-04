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
        Schema::create('forum_polls', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->mediuminteger('p1');
            $table->mediuminteger('p2');
            $table->mediuminteger('p3');
            $table->mediuminteger('p4');
            $table->string('p1_name');
            $table->string('p2_name');
            $table->string('p3_name');
            $table->string('p4_name');
            $table->string('voters');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forum_polls');
    }
};
