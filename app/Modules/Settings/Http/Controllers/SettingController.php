<?php

namespace App\Modules\Settings\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Requests;
use App\Modules\Settings\Models\Setting;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $settings = Setting::orderBy('id', 'desc')->get();
   return View::make('settings::settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return View::make('settings::settings.create' );
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

     $validation = Validator::make($input, Setting::$rules,Setting::$messages);



     if ($validation->passes())
     {


        Setting::create($input);
   //\LogActivity::addToLog('Role '.$input['display'].' Added');
\Session::flash('flash_message','Setting added  .');
         return Redirect::route('settings.index');
     }

     return Redirect::route('settings.create')
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
      $setting = Setting::find($id);

      if (is_null($setting))
      {

          return Redirect::route('settings.index');
      }
      return View::make('settings::settings/.edit', compact('setting'));
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



      $validation = Validator::make($input, Setting::$rules,Setting::$messages);


      if ($validation->passes())
      {
          $user = Setting::find($id);
          $user->update($input);
    //\LogActivity::addToLog('Role '.$input['display'].' Updated');
    \Session::flash('flash_message','Successfully Updated.');
          return Redirect::route('settings.edit', $id);
      }
return Redirect::route('settings.edit', $id)
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
      $cat= Setting::find($id);
      Setting::find($id)->delete();
  //\LogActivity::addToLog('Role '.$role->display.' Deleted');
 \Session::flash('flash_message','Successfully Deleted.');
      return Redirect::route('settings.index')
   ->with('message', 'Setting Deleted.');
    }
}
