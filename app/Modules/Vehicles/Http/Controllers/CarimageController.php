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

        $validation = request()->validate(Carimage::$rules,Carimage::$messages);

        		$image = request()->input('url');
            $filename = str_replace(' ', '', request()->input('no_plate')).time() . '.' .request()->url->getClientOriginalExtension();
            if (!file_exists(public_path('vehicles')))
                {
                    mkdir(public_path('vehicles'), 0777, true);
                }
                    $path = public_path('vehicles/' . $filename);
                    \Image::make(request()->url->getRealPath())->resize(1200, 1200,function ($constraint) {
        		    $constraint->aspectRatio();
        		    })->save($path);
                 /*   $user->image = $filename;
                    $user->save()*/
        			$images ='vehicles/'.$filename;

              $vehicle_image = New Carimage;
              $vehicle_image->vehicle_id =request()->input('vehicle_id');
              $vehicle_image->title =request()->input('title');
              $vehicle_image->url =$images;
              $vehicle_image->save();

              $alerts = [
            'bustravel-flash'         => true,
            'bustravel-flash-type'    => 'success',
            'bustravel-flash-title'   => 'Vehicle Image Saving',
            'bustravel-flash-message' => ' Image has successfully been saved',
             ];

          return redirect()->route('vehicles.edit',$vehicle_image->vehicle_id)->with($alerts);
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
	Carimage::where('vehicle_id', $user->vehicle_id)->update(array('featured'=>0));
	Carimage::where('id', $id)->update(array('featured'=>1));
  $alerts = [
'bustravel-flash'         => true,
'bustravel-flash-type'    => 'success',
'bustravel-flash-title'   => 'Vehicle Image Featured',
'bustravel-flash-message' => ' Image Successfully Featured',
];

return redirect()->route('vehicles.edit',$user->vehicle_id)->with($alerts);
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
	    $image = Carimage::find($id);
      Carimage::find($id)->delete();
      $alerts = [
   'bustravel-flash'         => true,
   'bustravel-flash-type'    => 'success',
   'bustravel-flash-title'   => 'Vehicle Image Deleted',
   'bustravel-flash-message' => ' Image has successfully been removed',
    ];

 return redirect()->route('vehicles.edit',$image->vehicle_id)->with($alerts);
    }
}
