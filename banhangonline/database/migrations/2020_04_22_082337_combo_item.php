<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ComboItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combo_item', function (Blueprint $table) {
            $table->id();
            $table->integer('combo_id');
            $table->string('combo_item_name');
            $table->integer('id_item_01');
            $table->integer('id_item_02');
            $table->integer('id_item_03');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('combo_item');
    }
}
