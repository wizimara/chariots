<?php

namespace App\Modules\Renting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Modules\Vehicles\Models\Vehicle;
use App\User;
use App\Modules\Renting\Models\Pricing;
use App\Modules\Renting\Models\CarAvailableDate;
use App\Modules\Renting\Models\CarSchedule;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class PricingController extends Controller
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
      $items = Pricing::all();
  return View::make('renting::pricings.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $vehicles=Vehicle::where('status', 1)->get();
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
       $validation = request()->validate(Pricing::$rules,Pricing::$messages);

       $start_date =request()->input('start_date');
       $end_date =request()->input('end_date');

        if ($end_date < date('Y-m-d'))
        {

          $alerts = [
       'bustravel-flash'         => true,
       'bustravel-flash-type'    => 'error',
       'bustravel-flash-title'   => 'Pricing',
       'bustravel-flash-message' => 'End Date has already Passed  '. \Carbon\Carbon::parse($end_date)->format('d-m-Y '),
   ];
       return redirect()->route('pricings.create')->with($alerts);
        }
       $pricing = New Pricing;
       $pricing->vehicle_id =request()->input('vehicle_id');
       $pricing->dailyrate =request()->input('dailyrate');
       $pricing->dateranges =request()->input('dateranges')??NULL;
       $pricing->dailydriverrate =request()->input('dailydriverrate');
       $pricing->selfdrive =request()->input('selfdrive');
       $pricing->discount =request()->input('discount');
       $pricing->costofdelivery =request()->input('costofdelivery');
      //$pricing->totalprice =request()->input('totalprice');
      // $pricing->tripfee =request()->input('tripfee');
       //$pricing->totaltriprice =request()->input('totaltriprice');
       $pricing->save();

        $startDate = new \Carbon\Carbon(request()->input('start_date'));
        $endDate = new \Carbon\Carbon(request()->input('end_date'));
        $all_dates = array();
        while ($startDate->lte($endDate)){
        $all_dates[] = $startDate->toDateString();
        $startDate->addDay();
        }
        $schedule =new CarSchedule;
        $schedule->pricing_id =$pricing->id;
        $schedule->start_date =request()->input('start_date');
        $schedule->end_date =request()->input('end_date');
        $schedule->save();

        foreach($all_dates as $avaliabledate)
        {
        $avaliable =new CarAvailableDate;
        $avaliable->pricing_id =$pricing->id;
        $avaliable->schedule_id =$schedule->id;
        $avaliable->available_date =$avaliabledate;
        $avaliable->save();
        }

       $alerts = [
    'bustravel-flash'         => true,
    'bustravel-flash-type'    => 'success',
    'bustravel-flash-title'   => 'Pricing Saving',
    'bustravel-flash-message' => ' has successfully been saved',
];

    return redirect()->route('pricings.index')->with($alerts);

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
      $vehicles=Vehicle::where('status',1)->get();

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
      $validation = request()->validate(Pricing::$rules,Pricing::$messages);
      $pricing =  Pricing::find($id);
      $pricing->vehicle_id =request()->input('vehicle_id');
      $pricing->dailyrate =request()->input('dailyrate');
      $pricing->dateranges =request()->input('dateranges')??NULL;
      $pricing->dailydriverrate =request()->input('dailydriverrate');
      $pricing->selfdrive =request()->input('selfdrive');
      $pricing->discount =request()->input('discount');
      $pricing->costofdelivery =request()->input('costofdelivery');
     //$pricing->totalprice =request()->input('totalprice');
     // $pricing->tripfee =request()->input('tripfee');
      //$pricing->totaltriprice =request()->input('totaltriprice');
      $pricing->save();

      $alerts = [
   'bustravel-flash'         => true,
   'bustravel-flash-type'    => 'success',
   'bustravel-flash-title'   => 'Pricing Saving',
   'bustravel-flash-message' => ' has successfully been saved',
];

   return redirect()->route('pricings.edit',$id)->with($alerts);
 }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
      $item= Pricing::find($id);
      $date=$item->car_available_dates()->delete();
      $schudeles=$item->schedules()->delete();
      Pricing::find($id)->delete();
      $alerts = [
   'bustravel-flash'         => true,
   'bustravel-flash-type'    => 'error',
   'bustravel-flash-title'   => 'Pricing Deleting',
   'bustravel-flash-message' => ' has successfully been deleted',
  ];

   return redirect()->route('pricings.index')->with($alerts);
    }

  public function schedulesstore()
  {
    $validation = request()->validate(CarSchedule::$rules);
    $start_date =request()->input('start_date');
    $end_date =request()->input('end_date');

     if ($end_date < date('Y-m-d'))
     {

       $alerts = [
    'bustravel-flash'         => true,
    'bustravel-flash-type'    => 'error',
    'bustravel-flash-title'   => 'Pricing',
    'bustravel-flash-message' => 'End Date has already Passed  '. \Carbon\Carbon::parse($end_date)->format('d-m-Y '),
];
    return redirect()->route('pricings.index')->with($alerts);
     }

     $startDate = new \Carbon\Carbon(request()->input('start_date'));
     $endDate = new \Carbon\Carbon(request()->input('end_date'));
     $all_dates = array();
     while ($startDate->lte($endDate)){
     $all_dates[] = $startDate->toDateString();
     $startDate->addDay();
     }
     $schedule =new CarSchedule;
     $schedule->pricing_id =request()->input('pricing_id');
     $schedule->start_date =request()->input('start_date');
     $schedule->end_date =request()->input('end_date');
     $schedule->save();

     foreach($all_dates as $avaliabledate)
     {
     $avaliable =new CarAvailableDate;
     $avaliable->pricing_id =request()->input('pricing_id');
     $avaliable->schedule_id =$schedule->id;
     $avaliable->available_date =$avaliabledate;
     $avaliable->save();
     }

    $alerts = [
 'bustravel-flash'         => true,
 'bustravel-flash-type'    => 'success',
 'bustravel-flash-title'   => 'Pricing Saving',
 'bustravel-flash-message' => ' has successfully been saved',
];

 return redirect()->route('pricings.edit',request()->input('pricing_id'))->with($alerts);

  }
}
