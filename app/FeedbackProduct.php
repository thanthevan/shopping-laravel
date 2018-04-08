<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeedbackProduct extends Model
{
    public function product()
    {
        return $this->hasMany('App\Product','product_id','id');
    }
    public function user()
    {
        return $this->hasMany('App\User','role_id','id');
    }
}
