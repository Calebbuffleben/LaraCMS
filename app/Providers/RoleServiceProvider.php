<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Role;

class RoleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton('role', function(){
            return new Role();
        });
    }
}
