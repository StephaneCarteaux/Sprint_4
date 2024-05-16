<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
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
        // We prevent lazy loading in production
        Model::preventLazyLoading(!app()->isProduction());

        // We evaluate this condition first as accessing the league table may fail
        // when the database is not yet ready (before migration for example)

        try {
            // We make all leagues and active league available in all views
            view()->share('allLeagues', League::all());
            view()->share('activeLeague', League::where('active', 1)->first());
        } catch (\Exception $e) {
            // Do nothing
        }
    }
}
