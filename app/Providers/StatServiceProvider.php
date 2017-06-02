<?php

namespace App\Providers;

use App\Services\StatRobot;
use App\Services\StatAll;

use Illuminate\Support\ServiceProvider;

class StatServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */

    public function boot()
    {
        app()->singleton(StatRobot::class, function($app){
            return new StatRobot($app->make('App\Robot'));
        });
        /*app()->singleton(StatAll::class, function($app){
            return new StatAll($app->make());
        });*/
        app()->make(StatAll::class, function(){
            return new StatAll();
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
