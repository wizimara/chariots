<?php

namespace App\Modules\Renting\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\View;


use App\Http\Requests;
use App\Modules\Renting\Models\Pricing;
use App\Modules\Renting\Models\Booking;
use App\Modules\Vehicles\Models\Vehicle;
use App\Modules\Renting\Models\Confirmedrental;
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
  $confirmed=Confirmedrental::pluck('booking_id')->all();
  return View::make('renting::bookings.index', compact('items','confirmed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     $vehicles=Pricing::join('vehicles','pricings.vehicle_id','=','vehicles.id')->
        join('models','model_id','=','models.id')
        ->join('makes','make_id','=','makes.id')
        ->join('categories','category_id','=','categories.id')
        ->select('pricings.*','model_name','make_name','cat_name')
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

       $datetime1 = date_create($input['end_date_of_use']);
      $datetime2 = date_create($input['starting_date_of_use']);
      $interval = date_diff($datetime1, $datetime2);
      $days=0;
      if($interval->format('%a')==0)
      {
      $days=1;
      }else
      {
      $days =$interval->format('%a')+1;

      }

$setting=\DB::table('settings')->where('key_name','trip_fee_percentage')->first();
$price=  Pricing::where('vehicle_id',$input['vehicle_id'])->first();
$totalcost=0;
if($input['driver_option']==1){
$totalcost= (($price->dailyrate*$days)+($price->selfdrive*$days)+$price->costofdelivery) - ($price->discount+$input['booking_discount']);
 $tripfee =$totalcost*$setting->key_value;
 $totalamount=$totalcost+$tripfee;
}else{
$totalcost= (($price->dailyrate*$days)+($price->dailydriverrate*$days)+$price->costofdelivery) - ($price->discount+$input['booking_discount']);
$tripfee =$totalcost*$setting->key_value;
$totalamount=$totalcost+$tripfee;
}
$user= Booking::create(array(
          'vehicle_id'=>$input['vehicle_id'],
  'user_id'=>$input['user_id'],
  'booking_status'=>$input['booking_status'],
    'date_of_booking'=>$input['date_of_booking'],
      'starting_date_of_use'=>$input['starting_date_of_use'],
      'end_date_of_use'=>$input['end_date_of_use'],
        'driver_option'=>$input['driver_option'],
          'totalcost'=>$totalamount,
            'booked_by'=>$input['booked_by']
        ));

      \DB::table('booking_price')->insert(

            array('booking_id' =>$user->id,
                    'cost1' => $price->dailyrate,
                    'cost2' => $price->dailydriverrate ,
                    'cost3' => $price->selfdrive,
                    'cost4' => $price->discount,
                    'cost5' => $price->costofdelivery,
                    'cost6' => $input['booking_discount']
                  ));

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
     $price=  Pricing::Where('vehicle_id',$item->vehicle_id)->first();
     $booking=\DB::table('booking_price')->where('booking_id',$id)->first();
     $setting=\DB::table('settings')->where('key_name','trip_fee_percentage')->first();
      $vehicles=Pricing::join('vehicles','pricings.vehicle_id','=','vehicles.id')->
      join('models','model_id','=','models.id')
      ->join('makes','make_id','=','makes.id')
      ->join('categories','category_id','=','categories.id')
      ->select('pricings.*','model_name','make_name','cat_name')
      ->orderBy('vehicles.id', 'desc')->get();
      $users =User::orderBy('name')->get();
      if (is_null($item))
      {

          return Redirect::route('bookings.index');
      }
      return View::make('renting::bookings.edit', compact('item','vehicles','users','booking','setting'));
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

$setting=\DB::table('settings')->where('key_name','trip_fee_percentage')->first();

     $validation = Validator::make($input, Booking::$rules,Booking::$messages);


     if ($validation->passes())
     {
       $datetime1 = date_create($input['end_date_of_use']);
     	$datetime2 = date_create($input['starting_date_of_use']);
     	$interval = date_diff($datetime1, $datetime2);
     $days=0;
      if($interval->format('%a')==0)
      {
     $days=1;
     }else
     {
     	$days =$interval->format('%a')+1;

     }

       $price=  Pricing::Where('vehicle_id',$input['vehicle_id'])->first();
       $totalcost=0;
       $totalamount=0;
       if($input['driver_option']==1){
       $totalcost= (($price->dailyrate*$days)+($price->selfdrive*$days)+$price->costofdelivery) - ($price->discount+$input['booking_discount']);
        $tripfee =$totalcost*$setting->key_value;
        $totalamount=$totalcost+$tripfee;
       }else{
       $totalcost= (($price->dailyrate*$days)+($price->dailydriverrate*$days)+$price->costofdelivery) - ($price->discount+$input['booking_discount']);
       $tripfee =$totalcost*$setting->key_value;
       $totalamount=$totalcost+$tripfee;
       }


         $user = Booking::find($id);
         $user->update(array(
           'vehicle_id'=>$input['vehicle_id'],
   'user_id'=>$input['user_id'],
   'booking_status'=>$input['booking_status'],
     'date_of_booking'=>$input['date_of_booking'],
       'starting_date_of_use'=>$input['starting_date_of_use'],
       'end_date_of_use'=>$input['end_date_of_use'],
         'driver_option'=>$input['driver_option'],
           'totalcost'=>$totalamount,
          //   'booked_by'=>$input['booked_by']
         ));

         \DB::table('booking_price')->where('id',$input['booking_price'])->update(

               array( 'cost1' => $price->dailyrate,
                       'cost2' => $price->dailydriverrate ,
                       'cost3' => $price->selfdrive,
                       'cost4' => $price->discount,
                       'cost5' => $price->costofdelivery,
                       'cost6' => $input['booking_discount']
                     ));

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
