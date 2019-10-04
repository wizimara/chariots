<?php

namespace App\Modules\Users\Http\Controllers;
use Illuminate\Support\Facades\View;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Http\Controllers\Controller;

class PermissionController extends Controller
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
      $permissions = Permission::orderBy('id', 'desc')->get();
   return View::make('users::permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return View::make('users::permissions.create' );
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


         Permission::create($input);
    //\LogActivity::addToLog('Role '.$input['display'].' Added');
flash('Permission added  .')->success()->important();
          return Redirect::route('permissions.index');
      }
  flash($validation->errors())->error()->important();
      return Redirect::route('permissions.create')
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
      $permissions = Permission::find($id);

   if (is_null($permissions))
   {

       return Redirect::route('permissions.index');
   }
   return View::make('users::permissions/edit', compact('permissions'));
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
          $user = Permission::find($id);
          $user->update($input);
    //\LogActivity::addToLog('Role '.$input['display'].' Updated');
    flash('Successfully Updated.')->success()->important();
          return Redirect::route('permissions.edit', $id);
      }
      flash($validation->errors())->error()->important();
return Redirect::route('permissions.edit', $id)
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
        //
    }
}
