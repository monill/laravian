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
        Schema::create('message_reports', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('message_id')->index();
            $table->unsignedBigInteger('reported_by')->index();

            $table->string('reason');
            $table->boolean('viewed')->default(0);
            $table->boolean('deleted')->default(0);
            $table->integer('time');

            $table->foreign('message_id')->references('id')->on('messages');
            $table->foreign('reported_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_reports');
    }
};
