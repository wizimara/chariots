<?php

namespace App\Modules\Vehicles\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


use App\Http\Requests;
use App\Modules\Vehicles\models\Make;
use App\Modules\Vehicles\models\Modelcars;
use App\Modules\Vehicles\models\Category;
use App\Modules\Vehicles\models\Vehicle;
use App\Modules\Vehicles\models\Carimage;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $items = Vehicle::join('models','model_id','=','models.id')
		  ->join('makes','make_id','=','makes.id')
		  ->join('categories','category_id','=','categories.id')
		  ->select('vehicles.*','model_name','make_name','cat_name')
		  ->orderBy('vehicles.id', 'desc')->get();
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
	$models =Modelcars::get();	
	$categories =Category::get();
       return View::make('vehicles::vehicles.create',compact('makes','models','categories') );
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

        $validation = Validator::make($input,Vehicle::$rules,Vehicle::$messages);
		
		

        if ($validation->passes())
        {
			
			
           Vehicle::create($input);
			//\LogActivity::addToLog('Role '.$input['display'].' Added');
  \Session::flash('flash_message','Vechile added  .');
            return Redirect::route('vehicles.index');
        }

        return Redirect::route('vehicles.create')
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
		$images=Carimage::where('vehicle_id',$id)->orderBy('featured','desc')->
		orderBy('id','desc')
		->get();
        $item = Vehicle::find($id);
$makes =Make::get();
	$models =Modelcars::get();	
	$categories =Category::get();
        if (is_null($item))
        {
			
            return Redirect::route('vehicles.index');
        }
        return View::make('vehicles::vehicles/edit', compact('item','makes','models','categories','images'));
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
	
	  
     
        $validation = Validator::make($input, Vehicle::$rules,Vehicle::$messages);
	
		
        if ($validation->passes())
        {
            $user = Vehicle::find($id);
            $user->update($input);
			//\LogActivity::addToLog('Role '.$input['display'].' Updated');
			\Session::flash('flash_message','Successfully Updated.');
            return Redirect::route('vehicles.edit', $id);
        }
return Redirect::route('vehicles.edit', $id)
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
        $item= vehicle::find($id); 
        Vehicle::find($id)->delete();
		//\LogActivity::addToLog('Role '.$role->display.' Deleted');
	 \Session::flash('flash_message','Successfully Deleted.');
        return Redirect::route('vehicles.index')
		 ->with('message', 'Vehicle Deleted.');
    }
}