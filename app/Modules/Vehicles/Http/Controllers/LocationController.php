<?php

namespace App\Modules\Vehicles\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


use App\Http\Requests;

use App\Modules\Vehicles\Models\Location;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $items = Location::orderBy('location_name', 'asc')->get();
		 return View::make('vehicles::locations.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return View::make('vehicles::locations.create' );
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

        $validation = Validator::make($input, Location::$rules,Location::$messages);
		
		

        if ($validation->passes())
        {
			
			
           Location::create($input);
			//\LogActivity::addToLog('Role '.$input['display'].' Added');
  \Session::flash('flash_message','Location added  .');
            return Redirect::route('locations.index');
        }

        return Redirect::route('location.create')
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
        $item = Location::find($id);

        if (is_null($item))
        {
			
            return Redirect::route('locations.index');
        }
        return View::make('vehicles::locations.edit', compact('item'));
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
	
	  
     
        $validation = Validator::make($input, Location::$rules,Location::$messages);
	
		
        if ($validation->passes())
        {
            $user = Location::find($id);
            $user->update($input);
			//\LogActivity::addToLog('Role '.$input['display'].' Updated');
			\Session::flash('flash_message','Successfully Updated.');
            return Redirect::route('locations.edit', $id);
        }
return Redirect::route('locations.edit', $id)
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
         $item= Location::find($id); 
        Location::find($id)->delete();
		//\LogActivity::addToLog('Role '.$role->display.' Deleted');
	 \Session::flash('flash_message','Successfully Deleted.');
        return Redirect::route('locations.index')
		 ->with('message', 'Location Deleted.');
    }
}
