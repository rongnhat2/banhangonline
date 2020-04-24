<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Item extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
            $table->id();
            $table->string('category_id');
            $table->string('sub_category_id');
            $table->string('item_name');
            $table->string('item_prices');
            $table->string('item_discount');
            $table->string('item_size');
            $table->string('item_image');
            $table->string('item_amount');
            $table->string('item_detail');
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
        Schema::dropIfExists('item');
    }
}
