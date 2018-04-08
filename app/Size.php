<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
	public $timestamps = false;
    protected $table = 'size';

    public function product()
    {
        return $this->belongsTo('App\Product','product_id','id');
    }
}
