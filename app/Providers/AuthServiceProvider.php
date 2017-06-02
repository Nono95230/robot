<?php

namespace App\Providers;

use App\Robot;
use App\Policies\RobotPolicy;

use App\User;
use App\Policies\UserPolicy;
use App\Category;
use App\Policies\CategoryPolicy;
use App\Tag;
use App\Policies\TagPolicy;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //'App\Model' => 'App\Policies\ModelPolicy',
        Robot::class  => RobotPolicy::class,
        User::class  => UserPolicy::class,
        Category::class  => CategoryPolicy::class,
        Tag::class  => TagPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /*Gate::define('destroy', function($user,$robot){
            // if ( !$user->role === 'administrator') {
            //     return false;
            // }
            // return true;
            
            return $robot->isAdmin;
        });*/
    }
}
