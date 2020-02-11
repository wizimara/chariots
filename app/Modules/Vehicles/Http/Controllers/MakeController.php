<?php

namespace App\Modules\Vehicles\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


use App\Http\Requests;

use App\Modules\Vehicles\Models\Make;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Http\Controllers\Controller;

class MakeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $items = Make::orderBy('make_name', 'asc')->get();
		 return View::make('vehicles::makes.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('vehicles::makes.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = request()->validate(Make::$rules);
         $make = New Make;
         $make->make_name =request()->input('make_name');
         $make->save();

         $alerts = [
      'bustravel-flash'         => true,
      'bustravel-flash-type'    => 'success',
      'bustravel-flash-title'   => 'Make Saving',
      'bustravel-flash-message' => 'Make has successfully been saved',
  ];

      return redirect()->route('makes.index')->with($alerts);
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
       $item = Make::find($id);

        if (is_null($item))
        {

            return Redirect::route('makes.index');
        }
        return View::make('vehicles::makes/.edit', compact('item'));
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
      $validation = request()->validate(Make::$rules);
      $ids=request()->input('id');
       $make = Make::find($ids);
       $make->make_name =request()->input('make_name');
       $make->save();

       $alerts = [
    'bustravel-flash'         => true,
    'bustravel-flash-type'    => 'success',
    'bustravel-flash-title'   => 'Make Saving',
    'bustravel-flash-message' => $make->make_name.'has successfully been Updated',
];

    return redirect()->route('makes.index')->with($alerts);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $item= Make::find($id);
        $name =$item->make_name;
        Make::find($id)->delete();
        $alerts = [
              'bustravel-flash'         => true,
              'bustravel-flash-type'    => 'error',
              'bustravel-flash-title'   => 'Make Deleted',
              'bustravel-flash-message' => $name." has successfully been deleted",
          ];

          return redirect()->route('makes.index')->with($alerts);
    }
}
