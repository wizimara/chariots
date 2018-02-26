<?php

namespace App\Modules\Renting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Modules\Renting\Models\Booking;

use App\Modules\Renting\Models\Confirmedrental;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;


use App\Http\Requests;
use App\Http\Controllers\Controller;

class ConfirmedrentalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $items = Confirmedrental::join('bookings','booking_id','=','bookings.id')
      ->Leftjoin('vehicles','bookings.vehicle_id','=','vehicles.id')
      ->Leftjoin('models','vehicles.model_id','=','models.id')
  ->Leftjoin('makes','models.make_id','=','makes.id')
  ->Leftjoin('categories','vehicles.category_id','=','categories.id')
  ->join('users','bookings.user_id','=','users.id')
  ->select('confirmedrentals.*','model_name','make_name','cat_name','name')
  ->orderBy('confirmedrentals.id', 'desc')->get();
  return View::make('renting::confirmedrentals.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $bookings=Booking::join('vehicles','bookings.vehicle_id','=','vehicles.id')
  ->Leftjoin('categories','vehicles.category_id','=','categories.id')
  ->Leftjoin('models','vehicles.model_id','=','models.id')
  ->Leftjoin('makes','models.make_id','=','makes.id')
->join('users','booked_by','=','users.id')
  ->select('bookings.*','model_name','make_name','cat_name','name')
  ->orderBy('bookings.id', 'desc')->get();

           return View::make('renting::confirmedrentals.create', compact('bookings') );
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

     $validation = Validator::make($input, Confirmedrental::$rules,Confirmedrental::$messages);



     if ($validation->passes())
     {


        Confirmedrental::create($input);
   //\LogActivity::addToLog('Role '.$input['display'].' Added');
\Session::flash('flash_message','Confirmation detials added  .');
         return Redirect::route('confirmedrentals.index');
     }

     return Redirect::route('confirmedrentals.create')
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
      $item = Confirmedrental::find($id);
      $bookings=Booking::join('vehicles','bookings.vehicle_id','=','vehicles.id')
  ->Leftjoin('categories','vehicles.category_id','=','categories.id')
  ->Leftjoin('models','vehicles.model_id','=','models.id')
  ->Leftjoin('makes','models.make_id','=','makes.id')
->join('users','booked_by','=','users.id')
  ->select('bookings.*','model_name','make_name','cat_name','name')
  ->orderBy('bookings.id', 'desc')->get();

      if (is_null($item))
      {

          return Redirect::route('confirmedrentals.index');
      }
      return View::make('renting::confirmedrentals.edit', compact('item','bookings'));
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



     $validation = Validator::make($input, Confirmedrental::$rules,Confirmedrental::$messages);


     if ($validation->passes())
     {
         $user = Confirmedrental::find($id);
         $user->update($input);
   //\LogActivity::addToLog('Role '.$input['display'].' Updated');
   \Session::flash('flash_message','Successfully Updated.');
         return Redirect::route('confirmedrentals.edit', $id);
     }
return Redirect::route('confirmedrentals.edit', $id)
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
      $item= Confirmedrental::find($id);
      Confirmedrental::find($id)->delete();
  //\LogActivity::addToLog('Role '.$role->display.' Deleted');
 \Session::flash('flash_message','Successfully Deleted.');
      return Redirect::route('confirmedrentals.index')
   ->with('message', 'Booking Deleted.');
    }
}
