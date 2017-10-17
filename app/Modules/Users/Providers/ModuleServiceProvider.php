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
                'text' => 'Users',
                'url'  => 'users',
                'icon' => 'group',
				'can'  => 'manage-users',
                'submenu' => [
							[
                                'text' => 'list users',
                                'url'  => route('users.list'),
                                'icon' => 'user',
                            ],
							[
                                'text' => 'permissions',
                                'url'  => route('permissions.list'),
                                'icon' => 'lock',
                            ],
                            [
                                'text' => 'roles',
                                'url'  => route('roles.list'),
                                'icon' => 'check',
                            ]
                           
                           
							
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
