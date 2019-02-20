<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Permission;

class PermissionServiceProvider extends ServiceProvider
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
        $this->app->singleton('permission', function(){
            return new Permission();
        });
    }
}
