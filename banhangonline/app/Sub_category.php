<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_category extends Model
{
	protected $table='sub_category';
    protected $fillable = ['category_id', 'sub_category_name', 'sub_category_image', 'sub_category_status'];
    public $timestamps = true;
}
