<?php

namespace App\Providers;

use App\Services\SubjectService;
use Illuminate\Support\ServiceProvider;

class SubjectServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('\App\Services\SubjectService', function($app) {
            return new SubjectService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
