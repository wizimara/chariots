<?php

namespace App\Modules\Users\Database\Seeds;

use Illuminate\Database\Seeder;
use App\Modules\Users\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	$admin = Role::create([
            'name' => 'Admin', 
            'slug' => 'admin',
            'permissions' => [
            'create-users' => true,
			'create-car-category' => true,
        	'create-car' => true,
        	'create-permissions' => true,
        	'edit-permissions' => true,
        	'delete-permissions' => true,
        	'assign-permissions' => true,
            ]
        ]);
        $car_owner = Role::create([
            'name' => 'Car Owner', 
            'slug' => 'car-owner',
            'permissions' => [
            'add-rental-car' => true,
            'edit-rental-car' => true,
			'delete-rental-car' => true,
            ]
        ]);
	$car_renter = Role::create([
            'name' => 'Client', 
            'slug' => 'car-renter',
            'permissions' => [
            'rental-car' => true,
            'pay' => true,                
            ]
        ]);
    }
}
