<?php

namespace App\Providers;

use App\Channel;

use View;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // \View::share('*', function ($view) {

        \View::composer('*', function ($view) {

            $view->with('channels', Channel::all());
         });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
