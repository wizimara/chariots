<?php

namespace App\Modules\Vehicles\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Requests;
use App\Modules\Vehicles\Models\Category;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::orderBy('id', 'desc')->get();
		 return View::make('vehicles::categories.index', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return View::make('vehicles::categories.create' );


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

        $validation = Validator::make($input, Category::$rules,Category::$messages);



        if ($validation->passes())
        {


           Category::create($input);
			//\LogActivity::addToLog('Role '.$input['display'].' Added');
  \Session::flash('flash_message','Category added  .');
            return Redirect::route('categories.index');
        }

        return Redirect::route('categories.create')
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
        $cat = Category::find($id);

        if (is_null($cat))
        {

            return Redirect::route('categories.index');
        }
        return View::make('vehicles::categories/.edit', compact('cat'));
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



        $validation = Validator::make($input, Category::$rules,Category::$messages);


        if ($validation->passes())
        {
            $user = Category::find($id);
            $user->update($input);
			//\LogActivity::addToLog('Role '.$input['display'].' Updated');
			\Session::flash('flash_message','Successfully Updated.');
            return Redirect::route('categories.edit', $id);
        }
return Redirect::route('categories.edit', $id)
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
        $cat= Category::find($id);
        Category::find($id)->delete();
		//\LogActivity::addToLog('Role '.$role->display.' Deleted');
	 \Session::flash('flash_message','Successfully Deleted.');
        return Redirect::route('categories.index')
		 ->with('message', 'Category Deleted.');
    }
}
