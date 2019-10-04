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
                            'icon' => 'lock',
                            // 'can' => 'accounts_management',
                            'submenu' => [
                              [
                                      'text' => 'Users',
                                      'url'  => route('users.index'),
                                      'icon' => 'lock',
                                      //'can'=>'Edit Payment',
                                    //'role'=>'admin',
                                  ],
                              [
                                      'text' => 'Roles',
                                      'url'  => route('roles.index'),
                                      'icon' => 'lock',
                                      //'can'=>'Edit Payment',
                                    //'role'=>'admin',
                                  ],
                                  [
                                      'text' => 'Permissions',
                                      'url'  => route('permissions.index'),
                                      'icon' => 'lock',
                                   //'can'=>'view_roles',
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
