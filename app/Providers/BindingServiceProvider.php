<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BindingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Contracts\Repositories\User\UserRepository','App\Repositories\User\EloquentUserRepository');
        $this->app->bind('App\Contracts\Repositories\Group\GroupRepository','App\Repositories\Group\EloquentGroupRepository');
    }
}
