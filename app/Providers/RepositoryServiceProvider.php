<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind('App\Repositories\UserRepositoryInterface', function() {
            return new \App\Repositories\Eloquents\UserRepository(\App\Models\User::class);
        });

        $this->app->bind('App\Repositories\CourseRepositoryInterface', function() {
            return new \App\Repositories\Eloquents\CourseRepository(\App\Models\Course::class);
        });

    }
}
