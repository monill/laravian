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
        Schema::create('enforcements', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('from_world_id')->index();
            $table->unsignedBigInteger('to_world_id')->index();

            $table->tinyInteger('hero')->default(0);
            $table->integer('u1')->default(0);
            $table->integer('u2')->default(0);
            $table->integer('u3')->default(0);
            $table->integer('u4')->default(0);
            $table->integer('u5')->default(0);
            $table->integer('u6')->default(0);
            $table->integer('u7')->default(0);
            $table->integer('u8')->default(0);
            $table->integer('u9')->default(0);
            $table->integer('u10')->default(0);
            $table->integer('u11')->default(0);
            $table->integer('u12')->default(0);
            $table->integer('u13')->default(0);
            $table->integer('u14')->default(0);
            $table->integer('u15')->default(0);
            $table->integer('u16')->default(0);
            $table->integer('u17')->default(0);
            $table->integer('u18')->default(0);
            $table->integer('u19')->default(0);
            $table->integer('u20')->default(0);
            $table->integer('u21')->default(0);
            $table->integer('u22')->default(0);
            $table->integer('u23')->default(0);
            $table->integer('u24')->default(0);
            $table->integer('u25')->default(0);
            $table->integer('u26')->default(0);
            $table->integer('u27')->default(0);
            $table->integer('u28')->default(0);
            $table->integer('u29')->default(0);
            $table->integer('u30')->default(0);
            $table->integer('u31')->default(0);
            $table->integer('u32')->default(0);
            $table->integer('u33')->default(0);
            $table->integer('u34')->default(0);
            $table->integer('u35')->default(0);
            $table->integer('u36')->default(0);
            $table->integer('u37')->default(0);
            $table->integer('u38')->default(0);
            $table->integer('u39')->default(0);
            $table->integer('u40')->default(0);
            $table->integer('u41')->default(0);
            $table->integer('u42')->default(0);
            $table->integer('u43')->default(0);
            $table->integer('u44')->default(0);
            $table->integer('u45')->default(0);
            $table->integer('u46')->default(0);
            $table->integer('u47')->default(0);
            $table->integer('u48')->default(0);
            $table->integer('u49')->default(0);
            $table->integer('u50')->default(0);

            $table->foreign('from_world_id')->references('id')->on('worlds');
            $table->foreign('to_world_id')->references('id')->on('worlds');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enforcements');
    }
};
