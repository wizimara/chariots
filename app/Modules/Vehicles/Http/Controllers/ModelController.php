<?php

namespace App\Modules\Vehicles\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


use App\Http\Requests;

use App\Modules\Vehicles\Models\Modelcars;
use App\Modules\Vehicles\Models\Make;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Http\Controllers\Controller;

class ModelController extends Controller
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
     $items = Modelcars::orderBy('model_name', 'asc')->get();
     $makes=Make::orderBy('make_name','asc')->get();
		 return View::make('vehicles::models.index', compact('items','makes'));
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
      $validation = request()->validate(Modelcars::$rules);
       $model = New Modelcars;
       $model->model_name =request()->input('model_name');
       $model->make_id =request()->input('make_id');
       $model->save();

        $alerts = [
      'bustravel-flash'         => true,
      'bustravel-flash-type'    => 'success',
      'bustravel-flash-title'   => 'Model Saving',
      'bustravel-flash-message' => $model->model_name.' has successfully been saved',
       ];

    return redirect()->route('models.index')->with($alerts);
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
       $validation = request()->validate(Modelcars::$rules);
       $ids=request()->input('id');
       $model = Modelcars::find($ids);
       $model->model_name =request()->input('model_name');
       $model->make_id =request()->input('make_id');
       $model->save();

        $alerts = [
      'bustravel-flash'         => true,
      'bustravel-flash-type'    => 'success',
      'bustravel-flash-title'   => 'Model Saving',
      'bustravel-flash-message' => $model->model_name.' has successfully been saved',
       ];

    return redirect()->route('models.index')->with($alerts);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
      $item= Modelcars::find($id);
      $name =$item->model_name;
      Modelcars::find($id)->delete();
      $alerts = [
            'bustravel-flash'         => true,
            'bustravel-flash-type'    => 'error',
            'bustravel-flash-title'   => 'Model Deleted',
            'bustravel-flash-message' => $name." has successfully been deleted",
        ];

        return redirect()->route('models.index')->with($alerts);
    }
}
