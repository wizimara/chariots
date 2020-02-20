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
      $validation = request()->validate(Setting::$rules,Setting::$messages);
         $setting = New Setting;
         $setting->key_name =request()->input('key_name');
         $setting->key_value =request()->input('key_value');
         $setting->key_desc =request()->input('key_desc');
         $setting->save();

         $alerts = [
      'bustravel-flash'         => true,
      'bustravel-flash-type'    => 'success',
      'bustravel-flash-title'   => 'Settings Saving',
      'bustravel-flash-message' => $setting->key_name .' Setting has successfully been saved',
  ];

      return redirect()->route('settings.index')->with($alerts);
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
      $validation = request()->validate(Setting::$rules,Setting::$messages);
         $ids=request()->input('id');
         $setting =  Setting::find($ids);
         $setting->key_name =request()->input('key_name');
         $setting->key_value =request()->input('key_value');
         $setting->key_desc =request()->input('key_desc');
         $setting->save();

         $alerts = [
      'bustravel-flash'         => true,
      'bustravel-flash-type'    => 'success',
      'bustravel-flash-title'   => 'Settings Updating',
      'bustravel-flash-message' => $setting->key_name .' , Setting has successfully been Updated',
  ];

      return redirect()->route('settings.index')->with($alerts);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
      $setting= Setting::find($id);
      $name =$setting->key_name;
      Setting::find($id)->delete();
      $alerts = [
            'bustravel-flash'         => true,
            'bustravel-flash-type'    => 'error',
            'bustravel-flash-title'   => 'Setting Deleted',
            'bustravel-flash-message' => $name. " , Setting has successfully been deleted",
        ];

        return redirect()->route('settings.index')->with($alerts);
    }
}
