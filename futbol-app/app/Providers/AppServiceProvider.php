<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\League;

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
        if (Schema::hasTable('leagues')) {
            // We make active league available in all views
            view()->share('activeLeague', League::where('active', 1)->first());
            view()->share('allLeagues', League::all());
        }
    }
}
