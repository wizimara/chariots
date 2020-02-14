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
      $validation = request()->validate(Location::$rules);
       $location = New Location;
       $location->location_name =request()->input('location_name');
       $location->save();

       $alerts = [
    'bustravel-flash'         => true,
    'bustravel-flash-type'    => 'success',
    'bustravel-flash-title'   => 'Location Saving',
    'bustravel-flash-message' => $location->location_name.' has successfully been saved',
];

    return redirect()->route('locations.index')->with($alerts);
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
      $validation = request()->validate(Location::$rules);
      $ids=request()->input('id');
       $location = Location::find($ids);
       $location->location_name =request()->input('location_name');
       $location->save();

       $alerts = [
    'bustravel-flash'         => true,
    'bustravel-flash-type'    => 'success',
    'bustravel-flash-title'   => 'Location Saving',
    'bustravel-flash-message' => $location->location_name.' has successfully been updated',
];

    return redirect()->route('locations.index')->with($alerts);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
         $item= Location::find($id);
         $name =$item->location_name;
        Location::find($id)->delete();
        $alerts = [
              'bustravel-flash'         => true,
              'bustravel-flash-type'    => 'error',
              'bustravel-flash-title'   => 'Location Deleted',
              'bustravel-flash-message' => $name." has successfully been deleted",
          ];

          return redirect()->route('locations.index')->with($alerts);
    }
}
