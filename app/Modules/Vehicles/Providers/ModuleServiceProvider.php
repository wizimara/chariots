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
                'icon' => 'fa fa-car',
                'submenu' => [
							             [
                                'text' => 'Categories',
                                'url'  => 'admin/vehicles/categories',
                                'icon' => 'fa fa-list',
                                'can' => 'Manage CR Categories',
                            ],
							              [
                                'text' => 'Makes',
                                'url'  => 'admin/vehicles/makes',
                                'icon' => 'fa fa-car',
                                'can' => 'Manage CR Makes',
                            ],
                            [
                                'text' => 'Models',
                                'url'  => 'admin/vehicles/models',
                                'icon' => 'fa fa-car',
                                'can' => 'Manage CR Models',
                            ],
                            [
                                'text' => 'Features',
                                'url'  => 'admin/vehicles/features',
                                'icon' => 'fa fa-list',
                                'can' => 'Manage CR Features',
                            ],
                            [
                                'text' => 'Locations',
                                'url'  => 'admin/vehicles/locations',
                                'icon' => ' fa fa-map-marker',
                                'can' => 'Manage CR Locations',
                            ],
                            [
                                'text' => 'Vehicles',
                                'url'  => 'admin/vehicles/vehicles',
                                'icon' => 'fa fa-car',
                                'can' => 'View CR Vehicles',
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
