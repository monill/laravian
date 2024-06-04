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
        Schema::create('natars_progresses', function (Blueprint $table) {
            $table->integer('last_expand_at');
            $table->integer('last_popuped_village');
            $table->integer('last_popup_at');
            $table->tinyinteger('artefact_released');
            $table->integer('artefact_released_at');
            $table->tinyinteger('wwbp_released');
            $table->integer('wwbp_released_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('natars_progresses');
    }
};
