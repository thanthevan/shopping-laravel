<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;
    protected $table= 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role','role_id','id');
    }


   public function isAdmin(){

        if($this->role->role == 1 || 2){
            return true;
        }
        return false;
    }
    public function access(){
       
        return $this->role->role;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];
}
