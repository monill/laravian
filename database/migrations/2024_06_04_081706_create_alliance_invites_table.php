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
        Schema::create('alliance_invites', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('alliance_id')->index();;
            $table->unsignedBigInteger('user_id')->index();;

            $table->smallinteger('sender');
            $table->tinyinteger('accept');
            $table->integer('timestamp');


            $table->foreign('alliance_id')->references('id')->on('alliances');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alliance_invites');
    }
};
