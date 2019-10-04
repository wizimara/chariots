<?php

namespace App\Modules\Users\Http\Controllers;

use Illuminate\Support\Facades\View;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Http\Controllers\Controller;

class RoleController extends Controller
{

  public function __construct()
  {
    //  $this->middleware('auth');

  // Fetch the Site Settings object

  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $roles = Role::orderBy('id', 'desc')->get();
   return View::make('users::roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $permissions = Permission::all();//Get all permissions
      return View::make('users::roles.create',compact('$permissions') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $input = Input::all();

      $validation = Validator::make($input, array(
           'name' => 'required'));



      if ($validation->passes())
      {


         Role::create(['name' => $input['name']]);
    //\LogActivity::addToLog('Role '.$input['display'].' Added');
         flash('Role added  .')->success()->important();
          return Redirect::route('roles.index');
      }
flash($validation->errors())->error()->important();
      return Redirect::route('roles.create')
          ->withInput()
          ->withErrors($validation)
          ->with('message', 'There were validation errors.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $role = Role::find($id);
	$permissions =Permission::get();
    if (is_null($role))
    {

        return Redirect::route('roles.index');
    }
    return View::make('users::roles/edit', compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $input = Input::all();



      $validation = Validator::make($input, array(
           'name' => 'required'));


      if ($validation->passes())
      {
          $role = Role::find($id);
          $role->update(['name' => $input['name']]);

$role->syncPermissions();
 $permissions = $request->input('permissions');
 foreach($permissions as $permission_id)
{
$permission_role=Permission::find($permission_id);
$role->givePermissionTo($permission_role);
//$vehicle->features()->attach($feature_id);
}

    //\LogActivity::addToLog('Role '.$input['display'].' Updated');
    flash($role->name.' Successfully Updated.')->success()->important();
          return Redirect::route('roles.edit', $id);
      }
      flash($validation->errors())->error()->important();
return Redirect::route('roles.edit', $id)
          ->withInput()
          ->withErrors($validation)
          ->with('message', 'There were validation errors.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $role= Role::find($id);
        Role::find($id)->delete();
		//\LogActivity::addToLog('Role '.$role->display.' Deleted');
	 flash($role->name.' Successfully Deleted.')->warning()->important();
        return Redirect::route('roles.index')
		 ->with('message', 'Role Deleted.');
    }
}
