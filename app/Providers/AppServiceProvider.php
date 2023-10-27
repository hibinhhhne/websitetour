<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use PSpell\Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // $slide = explode(',', Config::orderByDESC('id')->first()->slide);
        // view()->share('slide', $slide);
    }
}
