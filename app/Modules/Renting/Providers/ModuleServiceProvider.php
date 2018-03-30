<?php

namespace App\Modules\Renting\Providers;

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
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'renting');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'renting');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'renting');
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $menu = [
                'text' => 'RENTING',
                'url'  => 'renting',
                'icon' => 'money',
                'submenu' => [
                  [
                      'text' => 'Pricings',
                      'url'  => 'admin/renting/pricings',
                      'icon' => 'money',
                  ],
                  
                          [
                              'text' => 'Booking',
                              'url'  => 'admin/renting/bookings',
                              'icon' => 'money',
                          ],
                          [
                                'text' => 'Confirmation Rentals',
                                'url'  => 'admin/renting/confirmedrentals',
                                'icon' => 'money',
                          ],
                          [
                                  'text' => 'Payments',
                                  'url'  => 'admin/renting/payments',
                                  'icon' => 'money',
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
