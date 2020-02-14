<?php

namespace App\Modules\Vehicles\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


use App\Http\Requests;

use App\Modules\Vehicles\Models\Feature;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class FeaturesController extends Controller
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
        $validation = request()->validate(Feature::$rules);
         $feature = New Feature;
         $feature->feature_name =request()->input('feature_name');
         $feature->save();

         $alerts = [
      'bustravel-flash'         => true,
      'bustravel-flash-type'    => 'success',
      'bustravel-flash-title'   => 'Feature Saving',
      'bustravel-flash-message' => $feature->feature_name.' has successfully been saved',
  ];

      return redirect()->route('features.index')->with($alerts);
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
      $validation = request()->validate(Feature::$rules);
      $ids=request()->input('id');
       $feature = Feature::find($ids);
       $feature->feature_name =request()->input('feature_name');
       $feature->save();

       $alerts = [
    'bustravel-flash'         => true,
    'bustravel-flash-type'    => 'success',
    'bustravel-flash-title'   => 'Feature Saving',
    'bustravel-flash-message' => $feature->feature_name.' has successfully been updated',
];

    return redirect()->route('features.index')->with($alerts);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
         $item= Feature::find($id);
        $name =$item->model_name;
        Feature::find($id)->delete();
        $alerts = [
              'bustravel-flash'         => true,
              'bustravel-flash-type'    => 'error',
              'bustravel-flash-title'   => 'Feature Deleted',
              'bustravel-flash-message' => $name." has successfully been deleted",
          ];

          return redirect()->route('features.index')->with($alerts);
    }
}
