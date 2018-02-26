<?php

namespace App\Modules\Renting\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\View;


use App\Http\Requests;

use App\Modules\Renting\Models\Booking;
use App\Modules\Vehicles\Models\Vehicle;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $items = Booking::join('vehicles','vehicle_id','=','vehicles.id')
      ->Leftjoin('models','vehicles.model_id','=','models.id')
  ->Leftjoin('makes','models.make_id','=','makes.id')
  ->Leftjoin('categories','vehicles.category_id','=','categories.id')
  ->join('users','bookings.user_id','=','users.id')
  ->select('bookings.*','model_name','make_name','cat_name','name')
  ->orderBy('bookings.id', 'desc')->get();
  return View::make('renting::bookings.index', compact('items'));
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
           return View::make('renting::bookings.create', compact('vehicles','users') );
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

     $validation = Validator::make($input, Booking::$rules,Booking::$messages);



     if ($validation->passes())
     {


        Booking::create($input);
   //\LogActivity::addToLog('Role '.$input['display'].' Added');
\Session::flash('flash_message','Booking detials added  .');
         return Redirect::route('bookings.index');
     }

     return Redirect::route('bookings.create')
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
      $item = Booking::find($id);
      $vehicles=Vehicle::join('models','model_id','=','models.id')
      ->join('makes','make_id','=','makes.id')
      ->join('categories','category_id','=','categories.id')
      ->select('vehicles.*','model_name','make_name','cat_name')
      ->orderBy('vehicles.id', 'desc')->get();
      $users =User::orderBy('name')->get();
      if (is_null($item))
      {

          return Redirect::route('bookings.index');
      }
      return View::make('renting::bookings.edit', compact('item','vehicles','users'));
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



     $validation = Validator::make($input, Booking::$rules,Booking::$messages);


     if ($validation->passes())
     {
         $user = Booking::find($id);
         $user->update($input);
   //\LogActivity::addToLog('Role '.$input['display'].' Updated');
   \Session::flash('flash_message','Successfully Updated.');
         return Redirect::route('bookings.edit', $id);
     }
return Redirect::route('bookings.edit', $id)
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
      $item= Booking::find($id);
      Booking::find($id)->delete();
  //\LogActivity::addToLog('Role '.$role->display.' Deleted');
 \Session::flash('flash_message','Successfully Deleted.');
      return Redirect::route('bookings.index')
   ->with('message', 'Booking Deleted.');
    }
}
