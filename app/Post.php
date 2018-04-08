<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table= 'post';
public $timestamps = false;
    public function category_post()
    {
        return $this->belongsTo('App\CategoryPost','category_post','id');
    }

}
