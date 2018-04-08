<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{
	public $timestamps = false;
    protected $table = 'imageproduct';

    public function product()
    {
        return $this->belongsTo('App\Product','product_id','id');
    }
}
