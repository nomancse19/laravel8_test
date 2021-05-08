<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TestServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
   // public function register()
   // {
       //  $this->app->make('App\Library\Services\TestService');
   // }
	
	    public function register()
    {
        $this->app->bind('App\Library\Services\TestService', function () {
            return new TestService();
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
