<?php

namespace App\Modules\Vehicles\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Requests;
use App\Modules\Vehicles\Models\Carimage;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class CarimageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        $validation = Validator::make($input, Carimage::$rules,Carimage::$messages);



        if ($validation->passes())
        {



		 $image = $request->file('url');
            $filename = $input['vehicle_name'].time() . '.' . $image->getClientOriginalExtension();

			if (!file_exists(public_path('vehicles'))) {
  mkdir(public_path('vehicles'), 0777, true);
}


            $path = public_path('vehicles/' . $filename);


            \Image::make($image->getRealPath())->resize(1200, 1200,function ($constraint) {

		    $constraint->aspectRatio();

		})->save($path);
         /*   $user->image = $filename;
            $user->save()*/

			$images ='vehicles/'.$filename;




            Carimage::create(array(
			'vehicle_id' => $input['vehicle_id'],
			'title' => $input['title'],
			'url' => $images,

			));
  \Session::flash('flash_message','Image added  .');
            return Redirect::route('vehicles.edit', $input['vehicle_id']);
        }

        return Redirect::route('vehicles.edit', $input['vehicle_id'])
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
        //
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
        //
    }

	public function published($id)
	{
	$user = Carimage::find($id);
	\DB::table('carimages')->where('vehicle_id', $user->vehicle_id)->update(array('featured'=>0));

	\DB::table('carimages')->where('id', $id)->update(array('featured'=>1));

	\Session::flash('flash_message','Image Successfully Featured.');
            return Redirect::route('vehicles.edit', $user->vehicle_id);

	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	$user = Carimage::find($id);

      Carimage::find($id)->delete();
		//\LogActivity::addToLog('Role '.$role->display.' Deleted');
	 \Session::flash('flash_message','Successfully Deleted.');
        return Redirect::route('vehicles.edit', $user->vehicle_id)
		 ->with('message', 'Image Deleted.');
    }
}
