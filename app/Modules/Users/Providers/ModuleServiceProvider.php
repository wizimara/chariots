<?php

namespace App\Modules\Users\Providers;

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
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'users');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'users');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'users');
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
                        $menu = [
                            'text' => 'Account Management',
                            'icon' => 'fa fa-lock',
                            // 'can' => 'accounts_management',
                            'submenu' => [
                              [
                                      'text' => 'Users',
                                      'url'  => route('users'),
                                      'icon' => 'fa fa-users',
                                      'can'=>'View CR Users',
                                    //'role'=>'admin',
                                  ],
                              [
                                      'text' => 'Roles',
                                      'url'  => route('users.roles'),
                                      'icon' => 'fa fa-lock',
                                      'can'=>'Manage CR Roles',
                                    //'role'=>'admin',
                                  ],
                                  [
                                      'text' => 'Permissions',
                                      'url'  => route('users.permissions'),
                                      'icon' => 'fa fa-lock',
                                      'can'=>'Manage CR Permissions',
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
