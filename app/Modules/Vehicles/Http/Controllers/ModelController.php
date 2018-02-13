<?php

namespace App\Modules\Vehicles\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


use App\Http\Requests;

use App\Modules\Vehicles\models\Modelcars;
use App\Modules\Vehicles\models\Make;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Http\Controllers\Controller;

class ModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $items = Modelcars::join('makes','make_id','=','makes.id')
		 ->select('models.*','make_name')
		 ->orderBy('model_name', 'asc')->get();
		 return View::make('vehicles::models.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		
		$makes=Make::orderBy('make_name','asc')->get();
         return View::make('vehicles::models.create', compact('makes') );
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

        $validation = Validator::make($input, Modelcars::$rules,Modelcars::$messages);
		
		

        if ($validation->passes())
        {
			
			
           Modelcars::create($input);
			//\LogActivity::addToLog('Role '.$input['display'].' Added');
  \Session::flash('flash_message','Model added  .');
            return Redirect::route('models.index');
        }

        return Redirect::route('models.create')
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
        $item = Modelcars::find($id);
$makes=Make::orderBy('make_name','asc')->get();
        if (is_null($item))
        {
			
            return Redirect::route('models.index');
        }
        return View::make('vehicles::models/.edit', compact('item','makes'));
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
	
	  
     
        $validation = Validator::make($input, Modelcars::$rules,Modelcars::$messages);
	
		
        if ($validation->passes())
        {
            $user = Modelcars::find($id);
            $user->update($input);
			//\LogActivity::addToLog('Role '.$input['display'].' Updated');
			\Session::flash('flash_message','Successfully Updated.');
            return Redirect::route('models.edit', $id);
        }
return Redirect::route('models.edit', $id)
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
        $item= Modelcars::find($id); 
        Modelcars::find($id)->delete();
		//\LogActivity::addToLog('Role '.$role->display.' Deleted');
	 \Session::flash('flash_message','Successfully Deleted.');
        return Redirect::route('models.index')
		 ->with('message', 'Model Deleted.');
    }
}
