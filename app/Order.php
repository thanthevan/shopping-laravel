<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	 public $timestamps = false;
    protected $table = 'order';
   
    public function order_detail()
    {
        return $this->hasMany('App\OrderDetail','order_id','id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
