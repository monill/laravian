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
        Schema::create('movements', function (Blueprint $table) {
            $table->id();

            $table->smallinteger('from')->default(0);
            $table->smallinteger('to')->default(0);
            $table->tinyinteger('sort_type')->default(0);
            $table->mediuminteger('ref')->default(0);
            $table->string('data')->nullable(false);
            $table->integer('start_time')->default(0);
            $table->integer('end_time')->default(0);
            $table->tinyinteger('proc')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movements');
    }
};
