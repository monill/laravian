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
            $table->smallInteger('boughtgold')->default(0);
            $table->smallInteger('giftgold')->default(0);
            $table->smallInteger('transferedgold')->default(0);
            $table->smallInteger('addgold')->default(0);
            $table->smallInteger('usedgold')->default(0);
            $table->smallInteger('silver')->default(0);
            $table->smallInteger('addsilver')->default(0);
            $table->smallInteger('giftsilver')->default(0);
            $table->smallInteger('usedsilver')->default(0);
            $table->smallInteger('ausilver')->default(0);
            $table->smallInteger('bidsilver')->default(0);
            $table->tinyInteger('gender')->default(0);
            $table->date('birthday')->nullable();
            $table->string('location', 50)->nullable();
            $table->string('desc1', 255)->nullable();
            $table->string('desc2',255)->nullable();
            $table->integer('plus')->default(0);
            $table->integer('goldclub')->default(0);
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
            $table->string('sessid', 170)->nullable();
            $table->string('activate', 50)->nullable();
            $table->integer('timestamp')->default(0);
            $table->integer('ap')->default(0);
            $table->integer('apall')->default(0);
            $table->integer('dp')->default(0);
            $table->integer('dpall')->default(0);
            $table->integer('protect');
            $table->tinyInteger('quest')->nullable();
            $table->string('fquest', 45)->default('0,0,0,0,0,0,0,0,0,0');
            $table->string('quest_battle',70)->default('0,0,0,0,0,0,0,0,0,0,0,0,0,0');
            $table->string('quest_economy',45)->default('0,0,0,0,0,0,0,0,0');
            $table->string('quest_world',70)->default('0,0,0,0,0,0,0,0,0,0,0,0,0,0');
            $table->integer('cp')->default(1);
            $table->integer('lastupdate')->nullable();
            $table->bigInteger('rr')->default(0);
            $table->bigInteger('rc')->default(0);
            $table->tinyInteger('ok')->default(0);
            $table->bigInteger('clp')->default(0);
            $table->bigInteger('oldrank')->default(0);
            $table->integer('activateat')->nullable();
            $table->string('ancestor', 30)->nullable();
            $table->integer('ancestorgold')->default(0);
            $table->tinyInteger('reg2')->default(0);
            $table->string('ignore_msg', 100)->default('0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0');
            $table->string('ip',45)->nullable();
            $table->tinyInteger('chat_config')->default(1);

            $table->foreign('tribe_id')->references('id')->on('tribes');
            $table->foreign('timezone_id')->references('id')->on('timezones');
            $table->foreign('language_id')->references('id')->on('languages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
