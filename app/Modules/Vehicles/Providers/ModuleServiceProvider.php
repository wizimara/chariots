<?php

namespace App\Modules\Vehicles\Providers;

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
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'vehicles');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'vehicles');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'vehicles');
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $menu = [
                'text' => 'VEHICLES MANAGEMENT',
                'url'  => 'vehicles',
                'icon' => 'car',
                'submenu' => [
							             [
                                'text' => 'categories',
                                'url'  => 'admin/vehicles/categories',
                                'icon' => 'list',
                            ],
							              [
                                'text' => 'Makes',
                                'url'  => 'admin/vehicles/makes',
                                'icon' => 'car',
                            ],
                            [
                                'text' => 'Models',
                                'url'  => 'admin/vehicles/models',
                                'icon' => 'car',
                            ],
                            [
                                'text' => 'Features',
                                'url'  => 'admin/vehicles/features',
                                'icon' => 'list',
                            ],
                            [
                                'text' => 'Locations',
                                'url'  => 'admin/vehicles/locations',
                                'icon' => 'marker',
                            ],
                            [
                                'text' => 'Vehicles',
                                'url'  => 'admin/vehicles/vehicles',
                                'icon' => 'car',
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
