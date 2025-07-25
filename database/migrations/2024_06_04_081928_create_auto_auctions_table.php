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
        Schema::create('auto_auctions', function (Blueprint $table) {
            $table->id();

            $table->tinyinteger('number');
            $table->tinyinteger('active')->default(0);
            $table->integer('time');
            $table->integer('last_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auto_auctions');
    }
};
