<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeedbackProduct extends Model
{
	public $timestamps = false;
    protected $table = 'feedbackproduct';
    public function product()
    {
        return $this->hasMany('App\Product','product_id','id');
    }
    public function user()
    {
        return $this->hasMany('App\User','role_id','id');
    }
    public function nameUser($id)
    {
        $name = User::find($id)->name;
        return $name;
    }
}
