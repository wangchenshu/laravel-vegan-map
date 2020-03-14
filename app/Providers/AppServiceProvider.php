<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Http\Middleware\CheckUserRole;
use App\Role\UserRoleChecker;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CheckUserRole::class, function ($app) {
            return new CheckUserRole(
                $app->make(UserRoleChecker::class)
            );
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
