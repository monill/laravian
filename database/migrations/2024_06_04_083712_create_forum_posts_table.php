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
        Schema::create('forum_posts', function (Blueprint $table) {
            $table->id();

            $table->smallinteger('owner');
            $table->string('topic');
            $table->longtext('post');
            $table->integer('date');
            $table->integer('alliance0');
            $table->integer('player0');
            $table->integer('coor0');
            $table->integer('report0');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forum_posts');
    }
};
