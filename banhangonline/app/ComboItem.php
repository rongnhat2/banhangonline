<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComboItem extends Model
{
	protected $table='combo_item';
    protected $fillable = ['combo_id', 'combo_item_name', 'id_item_01', 'id_item_02', 'id_item_03'];
    public $timestamps = true;
}
