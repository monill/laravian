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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('sender_id')->index();
            $table->unsignedBigInteger('receiver_id')->index();

            $table->string('topic');
            $table->longtext('message');
            $table->boolean('viewed');
            $table->boolean('archived');
            $table->tinyInteger('send');

            $table->tinyInteger('deltarget')->nullable();
            $table->tinyInteger('delowner')->nullable();
            $table->smallInteger('alliance')->nullable();
            $table->smallInteger('player')->nullable();
            $table->smallInteger('coor')->nullable();
            $table->smallInteger('report')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
