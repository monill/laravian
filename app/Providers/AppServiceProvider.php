<?php

namespace App\Providers;

use App\Models\User;
use App\View\Components\AllianceLayout;
use App\View\Components\HeroSideLayout;
use App\View\Components\LinksLayout;
use App\View\Components\TroopsLayout;
use Illuminate\Support\ServiceProvider;

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
        view()->composer('partials.hero-side', function ($view) {
            $view->with('hero', HeroSideLayout::hero());
        });

        view()->composer('partials.alliance', function ($view) {
            $view->with('allianceInfo', AllianceLayout::alliance());
        });

        view()->composer('partials.links', function ($view) {
            $view->with('links', LinksLayout::links());
        });

        view()->composer('partials.links', function ($view) {
            $view->with('timestamp', LinksLayout::timestamp());
        });

        view()->composer('partials.troops', function ($view) {
            $view->with('units', TroopsLayout::showTroops());
        });
    }
}
