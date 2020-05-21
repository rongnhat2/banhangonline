<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	protected $table='item';
    protected $fillable = ['category_id', 'sub_category_id', 'item_name', 'item_prices', 'item_discount', 'item_image', 'item_amount', 'item_detail', 'item_view'];
    public $timestamps = true;
}
