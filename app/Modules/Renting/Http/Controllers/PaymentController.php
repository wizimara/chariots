<?php

namespace App\Modules\Renting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Modules\Renting\Models\Payment;

use App\Modules\Renting\Models\Confirmedrental;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
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
      $items = Payment::join('confirmedrentals','confirmed_rentals_id','=','confirmedrentals.id')
->Leftjoin('bookings','confirmedrentals.booking_id','=','bookings.id')
      ->Leftjoin('vehicles','bookings.vehicle_id','=','vehicles.id')
      ->Leftjoin('models','vehicles.model_id','=','models.id')
  ->Leftjoin('makes','models.make_id','=','makes.id')
  ->Leftjoin('categories','vehicles.category_id','=','categories.id')
  ->join('users','bookings.user_id','=','users.id')
  ->select('payments.*','model_name','make_name','cat_name','name')
  ->orderBy('payments.id', 'desc')->get();
  return View::make('renting::payments.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $bookings=Confirmedrental::join('bookings','booking_id','bookings.id')
      ->join('vehicles','bookings.vehicle_id','=','vehicles.id')
  ->Leftjoin('categories','vehicles.category_id','=','categories.id')
  ->Leftjoin('models','vehicles.model_id','=','models.id')
  ->Leftjoin('makes','models.make_id','=','makes.id')
->leftjoin('users','bookings.booked_by','=','users.id')
  ->select('confirmedrentals.*','model_name','make_name','cat_name','name')
  ->orderBy('confirmedrentals.id', 'desc')->get();

           return View::make('renting::payments.create', compact('bookings') );
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

     $validation = Validator::make($input, Payment::$rules,Payment::$messages);



     if ($validation->passes())
     {


        Payment::create($input);

        Confirmedrental::where('id', $input['confirmed_rentals_id'])
          ->update(['payment_status' => '1']);
   //\LogActivity::addToLog('Role '.$input['display'].' Added');
\Session::flash('flash_message','Payment detials added  .');
         return Redirect::route('payments.index');
     }

     return Redirect::route('payments.create')
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
      $item = Payment::find($id);
      $bookings=Confirmedrental::join('bookings','booking_id','bookings.id')
      ->join('vehicles','bookings.vehicle_id','=','vehicles.id')
  ->Leftjoin('categories','vehicles.category_id','=','categories.id')
  ->Leftjoin('models','vehicles.model_id','=','models.id')
  ->Leftjoin('makes','models.make_id','=','makes.id')
->leftjoin('users','bookings.booked_by','=','users.id')
  ->select('confirmedrentals.*','model_name','make_name','cat_name','name')
  ->orderBy('confirmedrentals.id', 'desc')->get();
      if (is_null($item))
      {

          return Redirect::route('payments.index');
      }
      return View::make('renting::payments.edit', compact('item','bookings'));
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



     $validation = Validator::make($input, Payment::$rules,Payment::$messages);


     if ($validation->passes())
     {
         $user = Payment::find($id);
         $user->update($input);

         Confirmedrental::where('id', $input['confirmed_rentals_id'])
           ->update(['payment_status' => '1']);
   //\LogActivity::addToLog('Role '.$input['display'].' Updated');
   \Session::flash('flash_message','Successfully Updated.');
         return Redirect::route('payments.edit', $id);
     }
return Redirect::route('payments.edit', $id)
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
      $item= Payment::find($id);
      Payment::find($id)->delete();
  //\LogActivity::addToLog('Role '.$role->display.' Deleted');
 \Session::flash('flash_message','Successfully Deleted.');
      return Redirect::route('payments.index')
   ->with('message', 'Payment Detials Deleted.');
    }
}
