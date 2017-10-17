<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
		$this->registerUserPolicies();

        //
    }

	public function registerUserPolicies()
	{
		Gate::define('create-user', function ($user) {
		    return $user->hasAccess(['create-user']);
		});
		Gate::define('create-permissions', function ($user) {
		    return $user->hasAccess(['create-permissions']);
		});
		Gate::define('edit-permissions', function ($user) {
		    return $user->hasAccess(['edit-permissions']);
		});
		Gate::define('delete-permissions', function ($user) {
		    return $user->hasAccess(['delete-permissions']);
		});
		Gate::define('assign-permissions', function ($user) {
		    return $user->hasAccess(['assign-permissions']);
		});
		Gate::define('manage-users', function ($user) {
		    return $user->inRole('admin');
		});
	}
}
