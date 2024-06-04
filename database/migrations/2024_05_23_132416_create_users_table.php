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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tribe_id')->index()->nullable();
            $table->unsignedBigInteger('timezone_id')->index()->nullable();
            $table->unsignedBigInteger('language_id')->index()->nullable();

            $table->string('username', 45)->unique();
            $table->string('email', 70)->unique();
            $table->string('password', 100);
            $table->tinyInteger('access')->default(1); //1 = pendent, 2 = confirmed, 3 = suspension, 4 = banned

            $table->smallInteger('gold')->default(0);
            $table->smallInteger('bought_gold')->default(0);
            $table->smallInteger('gift_gold')->default(0);
            $table->smallInteger('transfered_gold')->default(0);
            $table->smallInteger('add_gold')->default(0);
            $table->smallInteger('used_gold')->default(0);
            $table->smallInteger('silver')->default(0);
            $table->smallInteger('add_silver')->default(0);
            $table->smallInteger('gift_silver')->default(0);
            $table->smallInteger('used_silver')->default(0);
            $table->smallInteger('au_silver')->default(0);
            $table->smallInteger('bid_silver')->default(0);
            $table->tinyInteger('gender')->default(0);
            $table->date('birthday')->nullable();
            $table->string('location', 50)->nullable();
            $table->string('desc1', 255)->nullable();
            $table->string('desc2',255)->nullable();
            $table->integer('plus')->default(0);
            $table->integer('gold_club')->default(0);
            $table->integer('b1')->default(0);
            $table->integer('b2')->default(0);
            $table->integer('b3')->default(0);
            $table->integer('b4')->default(0);
            $table->integer('b5')->default(0);
            $table->integer('att')->default(0);
            $table->integer('def')->default(0);
            $table->integer('sit1')->default(0);
            $table->integer('sit2')->default(0);
            $table->integer('alliance')->default(0);
            $table->integer('ap')->default(0);
            $table->integer('apall')->default(0);
            $table->integer('dp')->default(0);
            $table->integer('dpall')->default(0);

            $table->tinyInteger('quest')->nullable();
            $table->string('fquest', 45)->default('0,0,0,0,0,0,0,0,0,0');
            $table->string('quest_battle',70)->default('0,0,0,0,0,0,0,0,0,0,0,0,0,0');
            $table->string('quest_economy',45)->default('0,0,0,0,0,0,0,0,0');
            $table->string('quest_world',70)->default('0,0,0,0,0,0,0,0,0,0,0,0,0,0');
            $table->string('ignore_msg', 100)->default('0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0');
            $table->integer('cp')->default(1);
            $table->bigInteger('rr')->default(0);
            $table->bigInteger('rc')->default(0);
            $table->bigInteger('clp')->default(0);
            $table->bigInteger('old_rank')->default(0);
            $table->tinyInteger('ok')->default(0);

            $table->string('ancestor', 30)->nullable();
            $table->integer('ancestor_gold')->default(0);

            $table->string('ip',45)->nullable();
            $table->tinyInteger('chat_config')->default(1);

            $table->unsignedBigInteger('protect')->default(0);
            $table->string('activate', 50)->nullable();

            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('tribe_id')->references('id')->on('tribes');
            $table->foreign('timezone_id')->references('id')->on('timezones');
            $table->foreign('language_id')->references('id')->on('languages');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
