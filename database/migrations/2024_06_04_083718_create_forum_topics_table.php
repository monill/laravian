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
        Schema::create('forum_topics', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->longtext('post');
            $table->integer('date');
            $table->integer('post_date');
            $table->smallinteger('cat');
            $table->smallinteger('owner');
            $table->smallinteger('alliance');
            $table->string('ends');
            $table->string('close');
            $table->string('stick');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forum_topics');
    }
};
