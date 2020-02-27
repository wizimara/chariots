<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $permission1 = factory(Permission::class)->create(['name' => 'Manage CR Permissions']);
      $permission2 = factory(Permission::class)->create(['name' => 'Manage CR Roles']);
      $permission3 = factory(Permission::class)->create(['name' => 'Manage CR Categories']);
      $permission4 = factory(Permission::class)->create(['name' => 'Manage CR Makes']);
      $permission5 = factory(Permission::class)->create(['name' => 'Manage CR Makes']);
      $permission6 = factory(Permission::class)->create(['name' => 'Manage CR Models']);
      $permission7 = factory(Permission::class)->create(['name' => 'Manage CR Features']);
      $permission8 = factory(Permission::class)->create(['name' => 'Manage CR Locations']);
      $permission9 = factory(Permission::class)->create(['name' => 'Manage CR Locations']);
      $permission10 = factory(Permission::class)->create(['name' => 'Manage CR General Settings']);
      $permission11 = factory(Permission::class)->create(['name' => 'View CR Vehicles']);
      $permission12 = factory(Permission::class)->create(['name' => 'Create CR Vehicles']);
      $permission13 = factory(Permission::class)->create(['name' => 'Update CR Vehicles']);
      $permission14 = factory(Permission::class)->create(['name' => 'Delete CR Vehicles']);
      $permission15 = factory(Permission::class)->create(['name' => 'View CR Pricings']);
      $permission16 = factory(Permission::class)->create(['name' => 'Create CR Pricings']);
      $permission17 = factory(Permission::class)->create(['name' => 'Update CR Pricings']);
      $permission18 = factory(Permission::class)->create(['name' => 'Delete CR Pricings']);
      $permission19 = factory(Permission::class)->create(['name' => 'View CR Bookings']);
      $permission20 = factory(Permission::class)->create(['name' => 'Create CR Bookings']);
      $permission21 = factory(Permission::class)->create(['name' => 'Update CR Bookings']);
      $permission22 = factory(Permission::class)->create(['name' => 'Delete CR Bookings']);
      $permission23 = factory(Permission::class)->create(['name' => 'View CR Confirmed Bookings']);
      $permission24= factory(Permission::class)->create(['name' => 'Create CR Confirmed Bookings']);
      $permission25 = factory(Permission::class)->create(['name' => 'Update CR Confirmed Bookings']);
      $permission26 = factory(Permission::class)->create(['name' => 'Delete CR Confirmed Bookings']);
      $permission27 = factory(Permission::class)->create(['name' => 'View CR Payments']);
      $permission28 = factory(Permission::class)->create(['name' => 'Create CR Payments']);
      $permission29 = factory(Permission::class)->create(['name' => 'Update CR Payments']);
      $permission30 = factory(Permission::class)->create(['name' => 'Delete CR Payments']);
      $permission31 = factory(Permission::class)->create(['name' => 'View CR Users']);
      $permission32 = factory(Permission::class)->create(['name' => 'Create CR Users']);
      $permission33 = factory(Permission::class)->create(['name' => 'Update CR Users']);
      $permission34 = factory(Permission::class)->create(['name' => 'Delete CR Users']);

      $role1 = factory(Role::class)->create(['name' => 'CR Administrator']);
      $role1->givePermissionTo([
        $permission1, $permission2, $permission3, $permission4, $permission5, $permission6,
        $permission7, $permission8, $permission9, $permission10, $permission11, $permission12,
        $permission13, $permission14, $permission15, $permission16, $permission17, $permission18,
        $permission19, $permission20, $permission21, $permission22, $permission23, $permission24,
        $permission25, $permission26, $permission27, $permission28, $permission29, $permission30,
        $permission31, $permission32, $permission33, $permission34
      ]);
      $role2 = factory(Role::class)->create(['name' => 'CR Carowner']);
      $role2->givePermissionTo([
        $permission11, $permission12, $permission13, $permission14, $permission15, $permission16,
        $permission17, $permission18, $permission19, $permission20, $permission21, $permission22,
        $permission23, $permission24, $permission25, $permission26, $permission27, $permission28,
        $permission29, $permission30
      ]);
      $role3 = factory(Role::class)->create(['name' => 'CR Support']);
      $role3->givePermissionTo([
        $permission3, $permission4, $permission5, $permission6,
        $permission7, $permission8, $permission9, $permission11, $permission12,
        $permission13, $permission14, $permission15, $permission16, $permission17, $permission18,
        $permission19, $permission20, $permission21, $permission22, $permission23, $permission24,
        $permission25, $permission26, $permission27, $permission28, $permission29, $permission30,
        $permission31, $permission32, $permission33, $permission34
      ]);
      $role4 = factory(Role::class)->create(['name' => 'CR Client']);
      $user = User::where('email', 'admin@admin.com')->first();
      if (is_null($user)) {
          $user1 = factory(User::class)->create([
          'name'        => 'CR Super Admin',
          'email'       => 'admin@admin.com',
          'password'    => Hash::make('password'), // password
        ]);
          $user1->syncRoles($role1->name);
      } else {
          $user->syncRoles($role1->name);
      }
    }
}
