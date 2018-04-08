<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $table ='products';

    public function category()
    {
       return $this->belongsTo('App\Category','category_id','id');
    }

    public function size()
    {
       return $this->hasMany('App\Size','product_id','id');
    }

    public function color()
    {
        return $this->hasMany('App\Color','product_id','id');
    }

    public function image_product( )
    {
        return $this->hasMany('App\ImageProduct','product_id','id');
    }

    public function order_detail()
    {
        return $this->hasMany('App\OrderDetail','product_id','id');
    }

    public function feedbackproduct()
    {
       return $this->hasMany('App\FeedbackProduct','product_id','id');
    }
}
