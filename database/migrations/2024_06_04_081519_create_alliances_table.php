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
        Schema::create('alliances', function (Blueprint $table) {
            $table->id();

            $table->smallinteger('leader')->nullable(false);

            $table->string('name')->nullable(false);
            $table->string('tag')->nullable(false);
            $table->string('notice')->nullable(false);
            $table->string('desc')->nullable(false);

            $table->integer('coor')->nullable(false);
            $table->integer('advisor')->nullable(false);
            $table->integer('recruiter')->nullable(false);

            $table->tinyinteger('max')->nullable(false);

            $table->biginteger('ap')->default(0);
            $table->biginteger('dp')->default(0);
            $table->biginteger('rc')->default(0);
            $table->biginteger('rr')->default(0);
            $table->biginteger('aap')->default(0);
            $table->biginteger('adp')->default(0);
            $table->biginteger('clp')->default(0);
            $table->biginteger('old_rank')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alliances');
    }
};
