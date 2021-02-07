<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\TestRepositories;

class TestServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Test', function ($app){
          return new TestRepositories();
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
