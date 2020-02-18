<?php

namespace App\Modules\Renting\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\View;


use App\Http\Requests;
use App\Modules\Renting\Models\Pricing;
use App\Modules\Renting\Models\Booking;
use App\Modules\Renting\Models\BookingPrice;
use App\Modules\Renting\Models\CarAvailableDate;
use App\Modules\Renting\Models\BookedDate;
use App\Modules\Vehicles\Models\Vehicle;
use App\Modules\Renting\Models\Confirmedrental;
use App\Modules\Settings\Models\Setting;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
  public function __construct()
    {
        $this->middleware('web');
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $items = Booking::orderBy('id','DESC')->get();
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
     $vehicles=Pricing::all();
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
      $validation = request()->validate(Booking::$rules,Booking::$messages);

      $today =date('Y-m-d');
      if($today> request()->input('starting_date_of_use') )
      {
        $alerts = [
        'bustravel-flash'         => true,
        'bustravel-flash-type'    => 'error',
        'bustravel-flash-title'   => 'Booking Saving',
        'bustravel-flash-message' => 'Starting Date has already passed: '. \Carbon\Carbon::parse(request()->input('starting_date_of_use'))->format('d-m-Y '),
        ];
        return back()->withInput()->with($alerts);
      }
      if(request()->input('starting_date_of_use') > request()->input('end_date_of_use') )
      {
        $alerts = [
        'bustravel-flash'         => true,
        'bustravel-flash-type'    => 'error',
        'bustravel-flash-title'   => 'Booking Saving',
        'bustravel-flash-message' => 'End Date cannot be lessthan than Start Date : ',
        ];
        return back()->withInput()->with($alerts);
      }

      $startDate = new \Carbon\Carbon(request()->input('starting_date_of_use'));
      $endDate = new \Carbon\Carbon(request()->input('end_date_of_use'));
      $all_dates = array();
      while ($startDate->lte($endDate)){
       $all_dates[] = $startDate->toDateString();
       $startDate->addDay();
       }

$availabledates =CarAvailableDate::where('pricing_id',request()->input('vehicle_id'))->pluck('available_date')->all();
$result2= array_intersect($availabledates,   $all_dates);
if(empty($result2))
{
  $string2='';
  foreach ($all_dates as $value){
  $string2.=  \Carbon\Carbon::parse($value)->format('d-m-Y ').' , ';
  }
  $alerts = [
  'bustravel-flash'         => true,
  'bustravel-flash-type'    => 'error',
  'bustravel-flash-title'   => 'Booking Saving',
  'bustravel-flash-message' => 'Car Not avialable on these days: '. $string2,
  ];

  return back()->withInput()->with($alerts);
}


$bookeddates =BookedDate::where('pricing_id',request()->input('vehicle_id'))->pluck('booked_date')->all();
$result = array_intersect($bookeddates,   $all_dates);
if(!empty($result))
{
$string='';
foreach ($result as $value){
$string.=  \Carbon\Carbon::parse($value)->format('d-m-Y ').' , ';
}
$alerts = [
'bustravel-flash'         => true,
'bustravel-flash-type'    => 'error',
'bustravel-flash-title'   => 'Booking Saving',
'bustravel-flash-message' => 'These Dates are already Booked: '. $string,
];

return redirect()->route('bookings.create')->withInput()->with($alerts);
}
     $datetime1 = date_create(request()->input('end_date_of_use'));
     $datetime2 = date_create(request()->input('starting_date_of_use'));
     $interval = date_diff($datetime1, $datetime2);
     $days=0;
     if($interval->format('%a')==0)
     {
     $days=1;
     }else
     {
     $days =$interval->format('%a')+1;

     }

$setting=Setting::where('key_name','trip_fee_percentage')->first();
$price=  Pricing::find(request()->input('vehicle_id'));
$totalcost=0;
if(request()->input('driver_option')==1){
$totalcost= (($price->dailyrate*$days)+($price->selfdrive*$days)+$price->costofdelivery) - ($price->discount+request()->input('booking_discount'));
$tripfee =$totalcost*$setting->key_value;
$totalamount=$totalcost+$tripfee;
}else{
$totalcost= (($price->dailyrate*$days)+($price->dailydriverrate*$days)+$price->costofdelivery) - ($price->discount+request()->input('booking_discount'));
$tripfee =$totalcost*$setting->key_value;
$totalamount=$totalcost+$tripfee;
}
$booking = New Booking;
$booking->vehicle_id = request()->input('vehicle_id');
$booking->user_id = request()->input('user_id');
$booking->booking_status = request()->input('booking_status');
$booking->date_of_booking = request()->input('date_of_booking');
$booking->starting_date_of_use = request()->input('starting_date_of_use');
$booking->end_date_of_use = request()->input('end_date_of_use');
$booking->driver_option = request()->input('driver_option');
$booking->totalcost = $totalamount;
$booking->booked_by = request()->input('booked_by');
$booking->save();


$booking_price = New BookingPrice;
$booking_price->booking_id=$booking->id;
$booking_price->cost1=$price->dailyrate;
$booking_price->cost2=$price->dailydriverrate ;
$booking_price->cost3=$price->selfdrive;
$booking_price->cost4=$price->discount;
$booking_price->cost5=$price->costofdelivery ;
$booking_price->cost6=request()->input('booking_discount')??0;
$booking_price->save();

$alerts = [
'bustravel-flash'         => true,
'bustravel-flash-type'    => 'success',
'bustravel-flash-title'   => 'Booking Saving',
'bustravel-flash-message' => $booking->id .' has successfully been saved',
];

return redirect()->route('bookings.index')->with($alerts);
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
     $price=  Pricing::find($item->vehicle_id);
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

      $validation = request()->validate(Booking::$rules,Booking::$messages);
      $today =date('Y-m-d');
      if($today> request()->input('starting_date_of_use') )
      {
        $alerts = [
        'bustravel-flash'         => true,
        'bustravel-flash-type'    => 'error',
        'bustravel-flash-title'   => 'Booking Saving',
        'bustravel-flash-message' => 'Starting Date has already passed: '. \Carbon\Carbon::parse(request()->input('starting_date_of_use'))->format('d-m-Y '),
        ];
        return back()->withInput()->with($alerts);
      }
      if(request()->input('starting_date_of_use') > request()->input('end_date_of_use') )
      {
        $alerts = [
        'bustravel-flash'         => true,
        'bustravel-flash-type'    => 'error',
        'bustravel-flash-title'   => 'Booking Saving',
        'bustravel-flash-message' => 'End Date cannot be lessthan than Start Date : ',
        ];
        return back()->withInput()->with($alerts);
      }

      $startDate = new \Carbon\Carbon(request()->input('starting_date_of_use'));
      $endDate = new \Carbon\Carbon(request()->input('end_date_of_use'));
      $all_dates = array();
      while ($startDate->lte($endDate)){
       $all_dates[] = $startDate->toDateString();
       $startDate->addDay();
       }

$availabledates =CarAvailableDate::where('pricing_id',request()->input('vehicle_id'))->pluck('available_date')->all();
$result2= array_intersect($availabledates,   $all_dates);
if(empty($result2))
{
  $string2='';
  foreach ($all_dates as $value){
  $string2.=  \Carbon\Carbon::parse($value)->format('d-m-Y ').' , ';
  }
  $alerts = [
  'bustravel-flash'         => true,
  'bustravel-flash-type'    => 'error',
  'bustravel-flash-title'   => 'Booking Saving',
  'bustravel-flash-message' => 'Car Not avialable on these days: '. $string2,
  ];

  return back()->withInput()->with($alerts);
}


$bookeddates =BookedDate::where('pricing_id',request()->input('vehicle_id'))->pluck('booked_date')->all();
$result = array_intersect($bookeddates,   $all_dates);
if(!empty($result))
{
$string='';
foreach ($result as $value){
$string.=  \Carbon\Carbon::parse($value)->format('d-m-Y ').' , ';
}
$alerts = [
'bustravel-flash'         => true,
'bustravel-flash-type'    => 'error',
'bustravel-flash-title'   => 'Booking Saving',
'bustravel-flash-message' => 'These Dates are already Booked: '. $string,
];

return redirect()->route('bookings.edit',$id)->withInput()->with($alerts);
}
     $datetime1 = date_create(request()->input('end_date_of_use'));
     $datetime2 = date_create(request()->input('starting_date_of_use'));
     $interval = date_diff($datetime1, $datetime2);
     $days=0;
     if($interval->format('%a')==0)
     {
     $days=1;
     }else
     {
     $days =$interval->format('%a')+1;

     }

$setting=Setting::where('key_name','trip_fee_percentage')->first();
$price=  Pricing::find(request()->input('vehicle_id'));
$totalcost=0;
if(request()->input('driver_option')==1){
$totalcost= (($price->dailyrate*$days)+($price->selfdrive*$days)+$price->costofdelivery) - ($price->discount+request()->input('booking_discount'));
$tripfee =$totalcost*$setting->key_value;
$totalamount=$totalcost+$tripfee;
}else{
$totalcost= (($price->dailyrate*$days)+($price->dailydriverrate*$days)+$price->costofdelivery) - ($price->discount+request()->input('booking_discount'));
$tripfee =$totalcost*$setting->key_value;
$totalamount=$totalcost+$tripfee;
}
$booking = Booking::find($id);
$booking->vehicle_id = request()->input('vehicle_id');
$booking->user_id = request()->input('user_id');
$booking->booking_status = request()->input('booking_status');
$booking->date_of_booking = request()->input('date_of_booking');
$booking->starting_date_of_use = request()->input('starting_date_of_use');
$booking->end_date_of_use = request()->input('end_date_of_use');
$booking->driver_option = request()->input('driver_option');
$booking->totalcost = $totalamount;
$booking->booked_by = request()->input('booked_by');
$booking->save();


$booking_price = BookingPrice::where('booking_id',$booking->id)->first();
$booking_price->booking_id=$booking->id;
$booking_price->cost1=$price->dailyrate;
$booking_price->cost2=$price->dailydriverrate ;
$booking_price->cost3=$price->selfdrive;
$booking_price->cost4=$price->discount;
$booking_price->cost5=$price->costofdelivery ;
$booking_price->cost6=request()->input('booking_discount')??0;
$booking_price->save();

$alerts = [
'bustravel-flash'         => true,
'bustravel-flash-type'    => 'success',
'bustravel-flash-title'   => 'Booking Updated',
'bustravel-flash-message' => $booking->id .' has successfully been Updated',
];

return redirect()->route('bookings.edit',$id)->with($alerts);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
      $item= Booking::find($id);
      $name =$item->id;
      Booking::find($id)->delete();
      $alerts = [
      'bustravel-flash'         => true,
      'bustravel-flash-type'    => 'error',
      'bustravel-flash-title'   => 'Booking Deleting',
      'bustravel-flash-message' => $name .' has successfully been Deleted',
      ];

      return redirect()->route('bookings.index')->with($alerts);
    }
}
