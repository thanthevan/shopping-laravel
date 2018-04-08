<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
	public $timestamps = false;
    protected $table='categorypost';

    public function post()
    {
      return $this->hasMany('App\Post','category_post','id');
    }
}
