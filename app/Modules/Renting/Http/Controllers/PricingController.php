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
    public function destroy($id)
    {
      $item= Pricing::find($id);
      Pricing::find($id)->delete();
      $alerts = [
   'bustravel-flash'         => true,
   'bustravel-flash-type'    => 'error',
   'bustravel-flash-title'   => 'Pricing Deleting',
   'bustravel-flash-message' => ' has successfully been deleted',
  ];

   return redirect()->route('pricings.index')->with($alerts);
    }
}
