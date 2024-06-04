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
        Schema::create('sends', function (Blueprint $table) {
            $table->id();

            $table->integer('wood');
            $table->integer('clay');
            $table->integer('iron');
            $table->integer('crop');
            $table->tinyinteger('merchant');
            $table->tinyinteger('send');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sends');
    }
};
