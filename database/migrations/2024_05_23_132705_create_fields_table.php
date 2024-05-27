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
        Schema::create('fields', function (Blueprint $table) {
            $table->unsignedBigInteger('world_id')->index();

            $table->smallInteger('f1')->default(0);
            $table->smallInteger('f1t')->default(0);
            $table->smallInteger('f2')->default(0);
            $table->smallInteger('f2t')->default(0);
            $table->smallInteger('f3')->default(0);
            $table->smallInteger('f3t')->default(0);
            $table->smallInteger('f4')->default(0);
            $table->smallInteger('f4t')->default(0);
            $table->smallInteger('f5')->default(0);
            $table->smallInteger('f5t')->default(0);
            $table->smallInteger('f6')->default(0);
            $table->smallInteger('f6t')->default(0);
            $table->smallInteger('f7')->default(0);
            $table->smallInteger('f7t')->default(0);
            $table->smallInteger('f8')->default(0);
            $table->smallInteger('f8t')->default(0);
            $table->smallInteger('f9')->default(0);
            $table->smallInteger('f9t')->default(0);
            $table->smallInteger('f10')->default(0);
            $table->smallInteger('f10t')->default(0);
            $table->smallInteger('f11')->default(0);
            $table->smallInteger('f11t')->default(0);
            $table->smallInteger('f12')->default(0);
            $table->smallInteger('f12t')->default(0);
            $table->smallInteger('f13')->default(0);
            $table->smallInteger('f13t')->default(0);
            $table->smallInteger('f14')->default(0);
            $table->smallInteger('f14t')->default(0);
            $table->smallInteger('f15')->default(0);
            $table->smallInteger('f15t')->default(0);
            $table->smallInteger('f16')->default(0);
            $table->smallInteger('f16t')->default(0);
            $table->smallInteger('f17')->default(0);
            $table->smallInteger('f17t')->default(0);
            $table->smallInteger('f18')->default(0);
            $table->smallInteger('f18t')->default(0);
            $table->smallInteger('f19')->default(0);
            $table->smallInteger('f19t')->default(0);
            $table->smallInteger('f20')->default(0);
            $table->smallInteger('f20t')->default(0);
            $table->smallInteger('f21')->default(0);
            $table->smallInteger('f21t')->default(0);
            $table->smallInteger('f22')->default(0);
            $table->smallInteger('f22t')->default(0);
            $table->smallInteger('f23')->default(0);
            $table->smallInteger('f23t')->default(0);
            $table->smallInteger('f24')->default(0);
            $table->smallInteger('f24t')->default(0);
            $table->smallInteger('f25')->default(0);
            $table->smallInteger('f25t')->default(0);
            $table->smallInteger('f26')->default(0);
            $table->smallInteger('f26t')->default(0);
            $table->smallInteger('f27')->default(0);
            $table->smallInteger('f27t')->default(0);
            $table->smallInteger('f28')->default(0);
            $table->smallInteger('f28t')->default(0);
            $table->smallInteger('f29')->default(0);
            $table->smallInteger('f29t')->default(0);
            $table->smallInteger('f30')->default(0);
            $table->smallInteger('f30t')->default(0);
            $table->smallInteger('f31')->default(0);
            $table->smallInteger('f31t')->default(0);
            $table->smallInteger('f32')->default(0);
            $table->smallInteger('f32t')->default(0);
            $table->smallInteger('f33')->default(0);
            $table->smallInteger('f33t')->default(0);
            $table->smallInteger('f34')->default(0);
            $table->smallInteger('f34t')->default(0);
            $table->smallInteger('f35')->default(0);
            $table->smallInteger('f35t')->default(0);
            $table->smallInteger('f36')->default(0);
            $table->smallInteger('f36t')->default(0);
            $table->smallInteger('f37')->default(0);
            $table->smallInteger('f37t')->default(0);
            $table->smallInteger('f38')->default(0);
            $table->smallInteger('f38t')->default(0);
            $table->smallInteger('f39')->default(0);
            $table->smallInteger('f39t')->default(0);
            $table->smallInteger('f40')->default(0);
            $table->smallInteger('f40t')->default(0);
            $table->smallInteger('f99')->default(0);
            $table->smallInteger('f99t')->default(0);
            $table->string('wwname', 45)->nullable();

            $table->foreign('world_id')->references('id')->on('worlds');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fields');
    }
};
