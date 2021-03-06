<?php

namespace App\Modules\Users\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\View;
use App\User;
use Mail;
//use App\Modules\Users\Models\Role;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{

  public function __construct()
    {
        $this->middleware('web');
        $this->middleware('auth');
    }

    //fetching permissions
    public function permissions()
    {
        $permissions = Permission::all();

        return view('users::permissions.index', compact('permissions'));
    }

    // save Permission
    public function storepermissions(Request $request)
    {
        //validation
        //saving to the database
        $permission = new Permission();
        $permission->name = request()->input('name');
        $permission->guard_name = request()->input('guard_name') ?? 'web';
        $permission->save();
        $alerts = [
        'bustravel-flash'         => true,
        'bustravel-flash-type'    => 'success',
        'bustravel-flash-title'   => 'Permission Saving',
        'bustravel-flash-message' => 'Permission '.$permission->name.' has successfully been saved',
    ];

        return redirect()->route('users.permissions')->with($alerts);
    }

    //Upadte Permission
    public function updatepermissions($id, Request $request)
    {
        //saving to the database
        $permission = Permission::find(request()->input('id'));
        $permission->name = request()->input('name');
        $permission->guard_name = request()->input('guard_name') ?? 'web';
        $permission->save();
        $alerts = [
        'bustravel-flash'         => true,
        'bustravel-flash-type'    => 'success',
        'bustravel-flash-title'   => 'Permission Updating',
        'bustravel-flash-message' => 'Permission '.$permission->name.' has successfully been Updated',
    ];

        return redirect()->route('users.permissions')->with($alerts);
    }

    //Delete Permission
    public function deletepermissions($id)
    {
        $permission = Permission::find($id);
        $name = $permission->name;
        $permission->delete();
        $alerts = [
            'bustravel-flash'         => true,
            'bustravel-flash-type'    => 'error',
            'bustravel-flash-title'   => 'Permission Deleted',
            'bustravel-flash-message' => "Permission '.$name.' has successfully been deleted",
        ];

        return Redirect::route('users.permissions')->with($alerts);
    }

    //fetching Roles
    public function roles()
    {
        $roles = Role::all();

        return view('users::roles.index', compact('roles'));
    }

    public function createroles()
    {
        $permissions = Permission::all(); //Get all permissions
        return view('users::roles.create', compact('permissions'));
    }

    // save Role
    public function storeroles(Request $request)
    {
        //validation
        //saving to the database
        $role = new Role();
        $role->name = request()->input('name');
        $role->guard_name = request()->input('guard_name') ?? 'web';
        $role->save();
        $role->syncPermissions();
        $permissions = $request->input('permissions') ?? 0;
        if ($permissions != 0) {
            foreach ($permissions as $permission_id) {
                $permission_role = Permission::find($permission_id);
                $role->givePermissionTo($permission_role);
            }
        }

        $alerts = [
         'bustravel-flash'         => true,
         'bustravel-flash-type'    => 'success',
         'bustravel-flash-title'   => 'Role Saving',
         'bustravel-flash-message' => 'Role '.$role->name.' has successfully been saved',
     ];

        return redirect()->route('users.roles')->with($alerts);
    }

    public function editroles($id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();
        if (is_null($role)) {
            return Redirect::route('users.roles');
        }

        return view('users::roles.edit', compact('role', 'permissions'));
    }

    //Upadte Role
    public function updateroles($id, Request $request)
    {
        //saving to the database
        $role = Role::find($id);
        $role->name = request()->input('name');
        $role->guard_name = request()->input('guard_name') ?? 'web';
        $role->save();
        $role->syncPermissions();
        $permissions = $request->input('permissions') ?? 0;
        if ($permissions != 0) {
            foreach ($permissions as $permission_id) {
                $permission_role = Permission::find($permission_id);
                $role->givePermissionTo($permission_role);
            }
        }
        $alerts = [
         'bustravel-flash'         => true,
         'bustravel-flash-type'    => 'success',
         'bustravel-flash-title'   => 'Role Updating',
         'bustravel-flash-message' => 'Role '.$role->name.' has successfully been Updated',
     ];

        return redirect()->route('users.roles.edit', $id)->with($alerts);
    }

    //Delete Role
    public function deleteroles($id)
    {
        $role = Role::find($id);
        $name = $role->name;
        $role->delete();
        $alerts = [
             'bustravel-flash'         => true,
             'bustravel-flash-type'    => 'error',
             'bustravel-flash-title'   => 'Role Deleted',
             'bustravel-flash-message' => 'Role '.$name.' has successfully been deleted',
         ];

        return Redirect::route('users.roles')->with($alerts);
    }

    //fetching Roles
    public function users()
    {
        $users = User::all();

        return view('users::users.index', compact('users'));
    }

    public function createusers()
    {
        $roles = Role::all(); //Get all permissions

        return view('users::users.create', compact('roles'));
    }

    // save Role
    public function storeusers(Request $request)
    {
        //validation
        //saving to the database
        $validation = request()->validate([
          'name'                  => 'required|max:255|unique:users',
          'email'                 => 'required|email|max:255|unique:users',
          'password'              => 'required|min:7|confirmed',
          'password_confirmation' => 'required|same:password',
        ]);
        $user_class = config('investmentclub.user_model', User::class);
        $user = new $user_class();
        $user->name = request()->input('name');
        $user->email = request()->input('email');
        $user->password = bcrypt(request()->input('password'));
        $user->user_status = request()->input('user_status');
        $user->save();
        $user->assignRole(request()->input('role'));

        $alerts = [
          'bustravel-flash'         => true,
          'bustravel-flash-type'    => 'success',
          'bustravel-flash-title'   => 'User Saving',
          'bustravel-flash-message' => 'User '.$user->name.' has successfully been saved',
      ];

        return redirect()->route('users')->with($alerts);
    }

    public function editusers($id)
    {
        $roles = Role::all(); //Get all permissions
        $user = User::find($id);
        if (is_null($user)) {
            return Redirect::route('users');
        }

        return view('users::users.edit', compact('roles', 'user'));
    }

    //Upadte Role
    public function updateusers($id, Request $request)
    {
        //saving to the database
        if (request()->input('newpassword') == '') {
            $validation = request()->validate([
            'name'  => 'required|max:255|unique:users,name,'.$id,
            'email' => 'required|email|max:255|unique:users,email,'.$id,
            //'password' => 'required|min:7|confirmed',
            //'password_confirmation' => 'required|same:password'
          ]);
            $user = config('bustravel.user_model', User::class)::find($id);
            $user->name = request()->input('name');
            $user->email = request()->input('email');
              $user->user_status = request()->input('user_status');
            $user->save();
            $user->syncRoles(request()->input('role'));
        } else {
            $validation = request()->validate([
            'name'                  => 'required|max:255|unique:users,name,'.$id,
            'email'                 => 'required|email|max:255|unique:users,email,'.$id,
            'newpassword'           => 'required|min:7|confirmed',
            'password_confirmation' => 'required|same:newpassword',
          ]);
            $user = config('bustravel.user_model', User::class)::find($id);
            $user->name = request()->input('name');
            $user->email = request()->input('email');
            $user->password = bcrypt(request()->input('password'));
              $user->user_status = request()->input('user_status');
            $user->save();
            $user->syncRoles(request()->input('role'));
        }

        $alerts = [
          'bustravel-flash'         => true,
          'bustravel-flash-type'    => 'success',
          'bustravel-flash-title'   => 'User Updating',
          'bustravel-flash-message' => 'User '.$user->name.' has successfully been Updated',
      ];

        return redirect()->route('users.edit', $id)->with($alerts);
    }

    //Delete Role
    public function deleteusers($id)
    {
        $user = User::find($id);
        $name = $user->name;
        $user->delete();
        $alerts = [
              'bustravel-flash'         => true,
              'bustravel-flash-type'    => 'error',
              'bustravel-flash-title'   => 'User Deleted',
              'bustravel-flash-message' => 'User '.$name.' has successfully been deleted',
          ];

        return Redirect::route('users')->with($alerts);
    }
}
