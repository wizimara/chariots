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
                'icon' => 'fas fa-fw fa-money-bill-alt',
                'submenu' => [
                  [
                      'text' => 'Pricings',
                      'url'  => 'admin/renting/pricings',
                      'icon' => 'fas fa-fw fa-money-bill-alt',
                  ],

                          [
                              'text' => 'Booking',
                              'url'  => 'admin/renting/bookings',
                              'icon' => 'fas fa-fw fa-money-bill-alt',
                          ],
                          [
                                'text' => 'Confirmation Rentals',
                                'url'  => 'admin/renting/confirmedrentals',
                                'icon' => 'fas fa-fw fa-money-bill-alt',
                          ],
                          [
                                  'text' => 'Payments',
                                  'url'  => 'admin/renting/payments',
                                  'icon' => 'fas fa-fw fa-money-bill',
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
