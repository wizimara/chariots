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
        $validation = request()->validate(Category::$rules);
           $category = New Category;
           $category->cat_name =request()->input('cat_name');
           $category->save();

           $alerts = [
        'bustravel-flash'         => true,
        'bustravel-flash-type'    => 'success',
        'bustravel-flash-title'   => 'Client Saving',
        'bustravel-flash-message' => 'Account has successfully been saved',
    ];

        return redirect()->route('categories.index')->with($alerts);
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
        $validation = request()->validate(Category::$rules);
        $ids=request()->input('id');
        $category = Category::find($ids);
        $category->cat_name =request()->input('cat_name');
        $category->save();
        $alerts = [
     'bustravel-flash'         => true,
     'bustravel-flash-type'    => 'success',
     'bustravel-flash-title'   => 'Category Saving',
     'bustravel-flash-message' => 'Category has successfully been saved',
 ];

     return redirect()->route('categories.index')->with($alerts);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $cat= Category::find($id);
        Category::find($id)->delete();
        $alerts = [
              'bustravel-flash'         => true,
              'bustravel-flash-type'    => 'error',
              'bustravel-flash-title'   => 'Saving Deleted',
              'bustravel-flash-message' => "Saving has successfully been deleted",
          ];

          return redirect()->route('categories.index')->with($alerts);
    }
}
