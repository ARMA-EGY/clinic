<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Logo;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view)
        {
            $logo    = Logo::first();

            $view->with('logo', $logo);
        });
    }
}
