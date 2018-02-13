<?php

namespace App\Modules\Vehicles\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


use App\Http\Requests;

use App\Modules\Vehicles\models\Feature;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class Featurescontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Feature::orderBy('feature_name', 'asc')->get();
		 return View::make('vehicles::features.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return View::make('vehicles::features.create' );
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

        $validation = Validator::make($input, Feature::$rules,Feature::$messages);
		
		

        if ($validation->passes())
        {
			
			
           Feature::create($input);
			//\LogActivity::addToLog('Role '.$input['display'].' Added');
  \Session::flash('flash_message','Feature added  .');
            return Redirect::route('features.index');
        }

        return Redirect::route('features.create')
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
        $item = Feature::find($id);

        if (is_null($item))
        {
			
            return Redirect::route('features.index');
        }
        return View::make('vehicles::features/.edit', compact('item'));
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
	
	  
     
        $validation = Validator::make($input, Feature::$rules,Feature::$messages);
	
		
        if ($validation->passes())
        {
            $user = Feature::find($id);
            $user->update($input);
			//\LogActivity::addToLog('Role '.$input['display'].' Updated');
			\Session::flash('flash_message','Successfully Updated.');
            return Redirect::route('features.edit', $id);
        }
return Redirect::route('features.edit', $id)
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
         $item= Feature::find($id); 
        Feature::find($id)->delete();
		//\LogActivity::addToLog('Role '.$role->display.' Deleted');
	 \Session::flash('flash_message','Successfully Deleted.');
        return Redirect::route('features.index')
		 ->with('message', 'Make Deleted.');
    }
}
