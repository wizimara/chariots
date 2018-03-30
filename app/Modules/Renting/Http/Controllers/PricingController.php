<?php

namespace App\Modules\Renting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Modules\Vehicles\Models\Vehicle;
use App\User;
use App\Modules\Renting\Models\Pricing;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class PricingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $items = Pricing::join('vehicles','vehicle_id','=','vehicles.id')
      ->Leftjoin('models','vehicles.model_id','=','models.id')
      ->join('users','vehicles.user_id','=','users.id')
  ->Leftjoin('makes','models.make_id','=','makes.id')
  ->Leftjoin('categories','vehicles.category_id','=','categories.id')
  ->select('pricings.*','model_name','make_name','cat_name','name')
  ->orderBy('pricings.id', 'desc')->get();
  return View::make('renting::pricings.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $vehicles=Vehicle::join('models','model_id','=','models.id')
  ->join('makes','make_id','=','makes.id')
  ->join('categories','category_id','=','categories.id')
  ->select('vehicles.*','model_name','make_name','cat_name')
  ->orderBy('vehicles.id', 'desc')->get();
  $users =User::orderBy('name')->get();
  return View::make('renting::pricings.create', compact('vehicles','users') );
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

     $validation = Validator::make($input, Pricing::$rules,Pricing::$messages);



     if ($validation->passes())
     {


        Pricing::create($input);
   //\LogActivity::addToLog('Role '.$input['display'].' Added');
\Session::flash('flash_message','Pricings added  .');
         return Redirect::route('pricings.index');
     }

     return Redirect::route('pricings.create')
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
      $item = Pricing::find($id);
      $vehicles=Vehicle::join('models','model_id','=','models.id')
      ->join('makes','make_id','=','makes.id')
      ->join('categories','category_id','=','categories.id')
      ->select('vehicles.*','model_name','make_name','cat_name')
      ->orderBy('vehicles.id', 'desc')->get();

      if (is_null($item))
      {

          return Redirect::route('pricings.index');
      }
      return View::make('renting::pricings.edit', compact('item','vehicles'));
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



      $validation = Validator::make($input, Pricing::$rules,Pricing::$messages);


      if ($validation->passes())
      {
          $user = Pricing::find($id);
          $user->update($input);
    //\LogActivity::addToLog('Role '.$input['display'].' Updated');
    \Session::flash('flash_message','Successfully Updated.');
          return Redirect::route('pricings.edit', $id);
      }
return Redirect::route('pricings.edit', $id)
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
