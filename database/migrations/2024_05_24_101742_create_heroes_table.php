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
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('world_id')->index();
            $table->unsignedBigInteger('user_id')->index();

            $table->unsignedTinyInteger('level')->default(0);
            $table->smallInteger('adv')->nullable();
            $table->smallInteger('sucsadv')->nullable();
            $table->tinyInteger('speed');
            $table->tinyInteger('item_speed')->nullable();
            $table->smallInteger('points');
            $table->mediumInteger('experience');
            $table->boolean('dead')->default(false);
            $table->smallInteger('health')->default(100);

            $table->integer('power');
            $table->integer('fsperpoint');
            $table->smallInteger('itemfs')->nullable();
            $table->integer('off_bonus');
            $table->integer('def_bonus');
            $table->integer('product');
            $table->integer('r0')->nullable();
            $table->integer('r1')->nullable();
            $table->integer('r2')->nullable();
            $table->integer('r3')->nullable();
            $table->integer('r4')->nullable();
            $table->integer('rc')->nullable();
            $table->integer('autoregen');
            $table->integer('itemautoregen')->nullable();
            $table->integer('extraexpgain');
            $table->integer('itemextraexpgain')->nullable();
            $table->integer('cpproduction');
            $table->integer('itemcpproduction')->nullable();
            $table->integer('infantrytrain')->nullable();
            $table->integer('iteminfantrytrain')->nullable();
            $table->integer('cavalrytrain')->nullable();
            $table->integer('itemcavalrytrain')->nullable();
            $table->integer('rob');
            $table->integer('itemrob')->nullable();
            $table->integer('extraresist');
            $table->integer('itemextraresist')->nullable();
            $table->integer('vsnatars');
            $table->integer('itemvsnatars')->nullable();
            $table->integer('accountmspeed');
            $table->integer('itemaccountmspeed')->nullable();
            $table->integer('allymspeed');
            $table->integer('itemallymspeed')->nullable();
            $table->integer('longwaymspeed');
            $table->integer('itemlongwaymspeed')->nullable();
            $table->integer('returnmspeed');
            $table->integer('itemreturnmspeed')->nullable();

            $table->integer('lastupdate');
            $table->integer('lastadv')->default(0);
            $table->string('hash', 45);
            $table->boolean('hide')->default(true);

            $table->foreign('world_id')->references('id')->on('worlds');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('heroes');
    }
};
