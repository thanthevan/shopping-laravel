<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	public $timestamps = false;
    protected $table ='role';

    public function admin()
    {
        return $this->hasMany('App\Admin','role_id','id');
    }
}
