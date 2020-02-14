<?php

namespace App\Modules\Vehicles\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


use App\Http\Requests;
use App\Modules\Vehicles\Models\Location;
use App\Modules\Vehicles\Models\Make;
use App\Modules\Vehicles\Models\Feature;
use App\Modules\Vehicles\Models\Modelcars;
use App\Modules\Vehicles\Models\Category;
use App\Modules\Vehicles\Models\Vehicle;
use App\Modules\Vehicles\Models\Carimage;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class VehiclesController extends Controller
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
          $items = Vehicle::all();
		 return View::make('vehicles::vehicles.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	$makes =Make::get();
	$models =Modelcars::join('makes','make_id','=','makes.id')
	->select('models.*','make_name')->orderBy('make_name','asc')
	->get();
	$features =Feature::get();
		$locations =Location::orderBy('location_name','asc')->get();
	$categories =Category::get();
  $users =User::orderBy('name')->get();
       return View::make('vehicles::vehicles.create',compact('makes','models','categories','features','locations','users') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validation = request()->validate(Vehicle::$rules);
       $vehicle = New Vehicle;
       $vehicle->model_id =request()->input('model_id');
       $vehicle->category_id =request()->input('category_id');
       $vehicle->year_model =request()->input('year_model');
       $vehicle->no_plate =strtoupper(str_replace(' ', '', request()->input('no_plate')));
       $vehicle->color =request()->input('color');
       $vehicle->passengers =request()->input('passengers');
       $vehicle->tracker =request()->input('tracker');
       $vehicle->transimition =request()->input('transimition');
       $vehicle->insurance_type =request()->input('insurance_type');
       $vehicle->insurance_expiry =request()->input('insurance_expiry')??NULL;
       $vehicle->vehicle_desc =request()->input('vehicle_desc');
       $vehicle->user_id =request()->input('user_id');
       $vehicle->status =request()->input('status');
       $vehicle->save();

       $features = $request->input('features');
    foreach($features as $feature_id)
    {
     $vehicle->features()->attach($feature_id);
    }

        $alerts = [
      'bustravel-flash'         => true,
      'bustravel-flash-type'    => 'success',
      'bustravel-flash-title'   => 'Model Saving',
      'bustravel-flash-message' => $vehicle->model_name.' has successfully been saved',
       ];

    return redirect()->route('vehicles.index')->with($alerts);
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


		$features =Feature::get();
		$locations =Location::orderBy('location_name','asc')->get();
		$images=Carimage::where('vehicle_id',$id)->orderBy('featured','desc')->
		orderBy('id','desc')
		->get();
        $item = Vehicle::find($id);

	$models =Modelcars::join('makes','make_id','=','makes.id')
	->select('models.*','make_name')->orderBy('make_name','asc')
	->get();
	$categories =Category::get();

  $users =User::orderBy('name')->get();
        if (is_null($item))
        {

            return Redirect::route('vehicles.index');
        }
        return View::make('vehicles::vehicles/edit', compact('item','features','models','categories','images','locations','users'));
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

      $validation = request()->validate([
        'model_id' => 'required',
      	'category_id' => 'required',
      	'year_model' => 'required',
      	'no_plate' => 'required|unique:vehicles,no_plate,'.$id,
      	'color' => 'required',
         'passengers' => 'required',
         'user_id' => 'required',
        'insurance_expiry' => 'required'
   ],Vehicle::$messages);
      $vehicle =  Vehicle::find($id);
      $vehicle->model_id =request()->input('model_id');
      $vehicle->category_id =request()->input('category_id');
      $vehicle->year_model =request()->input('year_model');
      $vehicle->no_plate =strtoupper(str_replace(' ', '', request()->input('no_plate')));
      $vehicle->color =request()->input('color');
      $vehicle->passengers =request()->input('passengers');
      $vehicle->tracker =request()->input('tracker');
      $vehicle->transimition =request()->input('transimition');
      $vehicle->insurance_type =request()->input('insurance_type');
      $vehicle->insurance_expiry =request()->input('insurance_expiry')??NULL;
      $vehicle->vehicle_desc =request()->input('vehicle_desc');
      $vehicle->user_id =request()->input('user_id');
      $vehicle->status =request()->input('status');
      $vehicle->save();

	    $features = $request->input('features');
      $vehicle->features()->detach();
      foreach($features as $feature_id)
      {
      	$vehicle->features()->attach($feature_id);
      }

      $alerts = [
    'bustravel-flash'         => true,
    'bustravel-flash-type'    => 'success',
    'bustravel-flash-title'   => 'Vehicle Saving',
    'bustravel-flash-message' => $vehicle->id.' has successfully been saved',
     ];

  return redirect()->route('vehicles.edit',$id)->with($alerts);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $item= vehicle::find($id);
        $name =$item->no_plate;
        Vehicle::find($id)->delete();
        $alerts = [
      'bustravel-flash'         => true,
      'bustravel-flash-type'    => 'error',
      'bustravel-flash-title'   => 'Vehicle Deleting',
      'bustravel-flash-message' => $name.'  Successfully Deleted',
      ];

      return redirect()->route('vehicles.index')->with($alerts);
    }
}
