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
      $items = Confirmedrental::all();
  return View::make('renting::confirmedrentals.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bookings=Booking::where('booking_status','Booked')->get();

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

      $validation = request()->validate(Confirmedrental::$rules,Confirmedrental::$messages);
      $booking = New Confirmedrental;
      $booking->booking_id =request()->input('booking_id');
      $booking->payment_status =request()->input('payment_status');
      $booking->car_pickup_status =request()->input('car_pickup_status');
      $booking->owner_pickup_confirmation =request()->input('owner_pickup_confirmation');
      $booking->pick_up_time =request()->input('pick_up_time');
      $booking->pick_up_date =request()->input('pick_up_date');
      $booking->save();

      $booking1 =Booking::find(request()->input('booking_id'));
      $booking1->booking_status='Confirmed';
      $booking1->save();
      $alerts = [
   'bustravel-flash'         => true,
   'bustravel-flash-type'    => 'success',
   'bustravel-flash-title'   => 'Pricing Saving',
   'bustravel-flash-message' => ' has successfully been saved',
];

   return redirect()->route('confirmedrentals.index')->with($alerts);
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
      $bookings=Booking::orderBy('bookings.id', 'desc')->get();

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
      $validation = request()->validate(Confirmedrental::$rules,Confirmedrental::$messages);
      $booking = Confirmedrental::find($id);
      $booking->booking_id =request()->input('booking_id');
      $booking->payment_status =request()->input('payment_status');
      $booking->car_pickup_status =request()->input('car_pickup_status');
      $booking->owner_pickup_confirmation =request()->input('owner_pickup_confirmation');
      $booking->pick_up_time =request()->input('pick_up_time');
      $booking->pick_up_date =request()->input('pick_up_date');
      $booking->save();

      $booking1 =Booking::find(request()->input('booking_id'));
      $booking1->booking_status='Confirmed';
      $booking1->save();
      $alerts = [
   'bustravel-flash'         => true,
   'bustravel-flash-type'    => 'success',
   'bustravel-flash-title'   => 'Pricing Updating',
   'bustravel-flash-message' => ' has successfully been saved',
];
 return redirect()->route('confirmedrentals.edit',$id)->with($alerts);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
      $item= Confirmedrental::find($id);
      $booking1 =Booking::find($item->booking_id);
      $booking1->booking_status='Booked';
      $booking1->save();
      $name =$item->id;
      Confirmedrental::find($id)->delete();

      $alerts = [
      'bustravel-flash'         => true,
      'bustravel-flash-type'    => 'error',
      'bustravel-flash-title'   => 'Booking Deleting',
      'bustravel-flash-message' => $name .' has successfully been Deleted',
      ];

      return redirect()->route('confirmedrentals.index')->with($alerts);
    }
}
