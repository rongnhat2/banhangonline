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
            $table->string('combo_id');
            $table->string('combo_item_name');
            $table->string('id_item_01');
            $table->string('id_item_02');
            $table->string('id_item_03');
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
