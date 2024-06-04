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
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();

            $table->smallinteger('owner');
            $table->smallinteger('pop');
            $table->smallinteger('rank');
            $table->integer('troops');
            $table->integer('troops_reinf');
            $table->integer('resources');
            $table->integer('time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistics');
    }
};
