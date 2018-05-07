<?php

namespace App\Providers;
use App\User;
use Illuminate\Support\ServiceProvider;
use Validator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

         Validator::extend('phone', function($attribute, $value, $parameters, $validator) {
            return preg_match('/^(01[2689]|09|08)[0-9]{8}$/',$value);
        });
          Validator::extend('uq', function($attribute, $value, $parameters, $validator) {
            if(User::where('email','=',$value)->first())
                return false;
            return true;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
