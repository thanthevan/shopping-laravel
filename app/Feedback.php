<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
  public function user()
    {
        return $this->hasMany('App\User','role_id','id');
    }
}
