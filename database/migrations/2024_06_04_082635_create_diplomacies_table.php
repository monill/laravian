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
        Schema::create('diplomacies', function (Blueprint $table) {
            $table->id();

            $table->smallinteger('alliance1');
            $table->smallinteger('alliance2');
            $table->tinyinteger('type');
            $table->tinyinteger('accepted');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diplomacies');
    }
};
