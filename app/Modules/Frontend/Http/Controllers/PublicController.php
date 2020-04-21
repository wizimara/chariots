<?php

namespace App\Modules\Frontend\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Modules\Renting\Models\Booking;
use App\Modules\Renting\Models\CarSchedule;
use App\Modules\Vehicles\Models\Carimage;
use App\Modules\Vehicles\Models\Category;
use App\Modules\Vehicles\Models\Feature;
use App\Modules\Vehicles\Models\Location;
use App\Modules\Vehicles\Models\Make;
use App\Modules\Vehicles\Models\Vehicle;
use App\Modules\Vehicles\Models\Modelcars;
use App\Modules\Settings\Models\Setting;
use App\Modules\Renting\Models\Pricing;
use App\Modules\Renting\Models\BookingPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PublicController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth')->only('book_vehicle');
	}
    public function showHomepage()
	{
		$vehicle_categories = Category::all();
		$vehicles_count = Vehicle::count();
		return view('frontend::index',compact('vehicle_categories','vehicles_count'));
	}
	public function view_vehicles_in_category(Request $request,$category_id)
	{		
		$vehicles = Vehicle::where('category_id',$category_id)->paginate(10);

		return view('frontend::cars_in_category',compact('vehicles'));
	}

	public function vehicle_detail($vehicle_id,$start_date,$end_date)
	{
		$vehicle = Vehicle::find($vehicle_id);
		$vehicle_images = Carimage::where('vehicle_id',$vehicle->id)->get();
		$vehicle_features = $vehicle->features()->get();
		$vehicle_makes = Make::all();
		$locations = Location::all();
		$features = Feature::all();
		//dd($vehicle_features);
		return view('frontend::vehicle_detail',compact('vehicle','vehicle_makes','locations','features','vehicle_images','vehicle_features','start_date','end_date'));
	}

	public function get_models($make_id)
	{
		return Modelcars::where('make_id',$make_id)->get();
	}

	public function search_for_vehicles(Request $request)
	{
		$date_format ='d M Y H:i';
		$request->validate([
			"location" => "required",
			"start_date" => "required|date|after:yesterday",
			"end_date" => "required|date|after:yesterday",
		]);

		//search in the car_schedules 
		$start_date = Carbon::createFromFormat('d M Y H:i',$request->start_date)->toDateString();
		$end_date = Carbon::createFromFormat('d M Y H:i',$request->end_date)->toDateString();
		
		
		
		$available_schedules = CarSchedule::where([
			['start_date','<=',$start_date],
			['end_date','>=',$end_date],
		])->paginate(10);
		
		// remove the ones that are booked
		foreach($available_schedules as $key=> $schedule)
		{
			$already_booked = Booking::where([
				['starting_date_of_use','<=',$start_date],
				['end_date_of_use','>=',$end_date],
			])->get();
			if(!$already_booked->isEmpty())
			{
				//dd($already_booked);
				$available_schedules->forget($key);
			}
		}
		//dd($available_schedules);
		return view('frontend::search_results',compact('available_schedules','start_date','end_date'));

	}

	public function book_vehicle(Request $request,$vehicle_id)
	{
		$validator = Validator::make($request->all(), [
            'start_date' => 'required',
            'end_date' => 'required',
		]);	
		
		if ($validator->fails()) {
			$alerts = [
				'bustravel-flash'         => true,
				'bustravel-flash-type'    => 'error',
				'bustravel-flash-title'   => 'Booking Saving',
				'bustravel-flash-message' => 'There are errors in your form',
				];
				
            	return back()
                        ->withErrors($validator)
						->withInput()
						->with($alerts);
        }
//verify that this period is not booked
		$start_date = Carbon::createFromFormat('d M Y H:i',$request->start_date)->toDateString();
		$end_date = Carbon::createFromFormat('d M Y H:i',$request->end_date)->toDateString();
		$already_booked = Booking::where([
			['starting_date_of_use','<=',$start_date],
			['end_date_of_use','>=',$end_date],
		])->get();

		$validator->after(function ($validator) use($already_booked) {
			if (!$already_booked->isEmpty()) {
				$validator->errors()->add('start_date', 'These dates are already booked by someone!');
			}
		});

		if ($validator->fails()) {
			$alerts = [
				'bustravel-flash'         => true,
				'bustravel-flash-type'    => 'error',
				'bustravel-flash-title'   => 'Booking Saving',
				'bustravel-flash-message' => 'There are errors in your form',
				];
				
            	return back()
                        ->withErrors($validator)
						->withInput()
						->with($alerts);
		}

		$datetime1 = date_create($start_date);
		$datetime2 = date_create($end_date);
		$interval = date_diff($datetime1, $datetime2);
		$days=0;
		if($interval->format('%a')==0)
		{
		$days=1;
		}else
		{
		$days =$interval->format('%a')+1;

		}
		
		$setting=Setting::where('key_name','trip_fee_percentage')->first();
		$price=  Pricing::find($request->vehicle_id);
		$totalcost=0;
		if($request->driver_option==1){
		$totalcost= (($price->dailyrate*$days)+($price->selfdrive*$days)+$price->costofdelivery) - ($price->discount);
		$tripfee =$totalcost*$setting->key_value;
		$totalamount=$totalcost+$tripfee;
		}else{
		$totalcost= (($price->dailyrate*$days)+($price->dailydriverrate*$days)+$price->costofdelivery) - ($price->discount);
		$tripfee =$totalcost*$setting->key_value;
		$totalamount=$totalcost+$tripfee;
		}
		$booking = New Booking;
		$booking->vehicle_id = $request->vehicle_id;
		$booking->user_id = Auth::user()->id;
		$booking->booking_status = 'Booked';
		$booking->date_of_booking = date('Y-m-d');
		$booking->starting_date_of_use = $start_date;
		$booking->end_date_of_use = $end_date;
		$booking->driver_option = 0;
		$booking->totalcost = $totalamount;
		$booking->booked_by = Auth::user()->id;
		$booking->save();


		$booking_price = New BookingPrice;
		$booking_price->booking_id=$booking->id;
		$booking_price->cost1=$price->dailyrate;
		$booking_price->cost2=$price->dailydriverrate ;
		$booking_price->cost3=$price->selfdrive;
		$booking_price->cost4=$price->discount;
		$booking_price->cost5=$price->costofdelivery ;
		$booking_price->cost6=$request->booking_discount ?? 0;
		$booking_price->save();

		$alerts = [
			'bustravel-flash'         => true,
			'bustravel-flash-type'    => 'success',
			'bustravel-flash-title'   => 'Booking Saving',
			'bustravel-flash-message' => $booking->id .' has successfully been saved',
			];
			
			return redirect()->route('frontend.notification')->with($alerts);
			
		
	}

	public function show_notification()
	{
		return view('frontend::notification');
	}
}
