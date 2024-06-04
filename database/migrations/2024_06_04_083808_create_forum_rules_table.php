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
        Schema::create('forum_rules', function (Blueprint $table) {
            $table->id();

            $table->integer('forum_id');
            $table->integer('players_id');
            $table->string('players_name');
            $table->integer('ally_id');
            $table->string('ally_tag');;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forum_rules');
    }
};
