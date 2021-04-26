<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class PositionsServiceProvider extends ServiceProvider
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
        Blade::directive('position', function ($positions) {
            return "<?php if(auth()->check() && auth()->user()->hasPosition($positions)) : ?>"; //return this if statement inside php tag
        });

        Blade::directive('endposition', function ($positions) {
            return "<?php endif; ?>"; //return this endif statement inside php tag
        });
    }
}
