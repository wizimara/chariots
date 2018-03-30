<?php

namespace App\Modules\Settings\Providers;

use Caffeinated\Modules\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'settings');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'settings');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'settings');

        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $menu = [
                'text' => 'Settings',
                'url'  => 'settings',
                'icon' => 'gear',
                'submenu' => [
                          [
                              'text' => 'Car Rental Settings',
                              'url'  => 'admin/settings/settings',
                              'icon' => 'gear',
                          ],

                      

                        ]
            ];
         $event->menu->add($menu);
        });

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
