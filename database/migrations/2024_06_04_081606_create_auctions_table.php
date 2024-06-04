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
        Schema::create('auctions', function (Blueprint $table) {
            $table->id();

            $table->smallinteger('item_id');
            $table->smallinteger('user_id');
            $table->smallinteger('owner');
            $table->smallinteger('num');
            $table->smallinteger('silver');
            $table->smallinteger('max_silver');

            $table->tinyinteger('btype');
            $table->tinyinteger('type');
            $table->tinyinteger('bids');
            $table->tinyinteger('finish');

            $table->integer('time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auctions');
    }
};
