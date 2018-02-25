<?php

namespace App\Modules\Renting\Providers;

use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'renting');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'renting');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'renting');
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
