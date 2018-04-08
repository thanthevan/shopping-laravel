<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
	public $timestamps = false;
    protected $table='color';

    public function product()
    {
        return $this->hasMany('App\Product','product_id','id');
    }
}
