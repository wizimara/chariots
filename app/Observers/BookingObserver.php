<?php

namespace App\Observers;

use App\Modules\Renting\Models\Pricing;
use App\Modules\Renting\Models\Booking;
use Illuminate\Support\Facades\Log;
use App\Modules\Settings\Models\Setting;
use App\Modules\Renting\Models\BookingPrice;
use App\Modules\Renting\Models\CarAvailableDate;
use Carbon\CarbonPeriod;
class BookingObserver
{
    /**
     * Handle the booking "created" event.
     *
     * @param  \App\Booking  $booking
     * @return void
     */
     public function saving(Booking $booking)
    {


      try {


              $today =date('Y-m-d');
              if($today> $booking->starting_date_of_use)
              {
            $error=    'Starting Date has already passed: '. \Carbon\Carbon::parse(request()->input('starting_date_of_use'))->format('d-m-Y ');

                throw new \Exception($error);

              }


              if($booking->starting_date_of_use > $booking->end_date_of_use )
              {
                throw new \Exception('End Date cannot be lessthan than Start Date ');
              }

              $startDate = new \Carbon\Carbon($booking->starting_date_of_use);
              $endDate = new \Carbon\Carbon($booking->end_date_of_use);
              $all_dates = [];
              $t_daterange = CarbonPeriod::create($startDate, $endDate);
              foreach ($t_daterange as $monthdate) {
              $all_dates[] = $monthdate->format('Y-m-d');
             }



        $availabledates =CarAvailableDate::where('pricing_id',$booking->vehicle_id)->pluck('available_date')->all();
        $result2= array_intersect($availabledates,   $all_dates);

        if(empty($result2))
        {
          $string2='';
          foreach ($all_dates as $value){
          $string2=  \Carbon\Carbon::parse($value)->format('d-m-Y ').' , ';
          }
            throw new \Exception('Car Not avialable on these days: '. $string2);
        }

        $datetime1 = date_create($booking->end_date_of_use);
        $datetime2 = date_create($booking->starting_date_of_use);
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
        $price=  Pricing::find($booking->vehicle_id);

        $totalcost=0;
        if($booking->driver_option==1){
        $totalcost= (($price->dailyrate*$days)+($price->selfdrive*$days)+$price->costofdelivery) - ($price->discount+request()->input('booking_discount'));
        $tripfee =$totalcost*$setting->key_value;
        $totalamount=$totalcost+$tripfee;
        }else{
        $totalcost= (($price->dailyrate*$days)+($price->dailydriverrate*$days)+$price->costofdelivery) - ($price->discount+request()->input('booking_discount'));
        $tripfee =$totalcost*$setting->key_value;
        $totalamount=$totalcost+$tripfee;
        }
        $booking->totalcost = $totalamount ;

      }
      catch(\Exception $e)
      {
          $error_string = $e->getMessage();
          $error = \Illuminate\Validation\ValidationException::withMessages([
            "you have an error $error_string"

          ]);
          throw $error;
      }
    }

    public function created(Booking $booking)
  {
     try
     {
        $price=  Pricing::find($booking->vehicle_id);
      $booking_price = New BookingPrice;
      $booking_price->booking_id=$booking->id;
      $booking_price->cost1=$price->dailyrate;
      $booking_price->cost2=$price->dailydriverrate ;
      $booking_price->cost3=$price->selfdrive;
      $booking_price->cost4=$price->discount;
      $booking_price->cost5=$price->costofdelivery ;
      $booking_price->cost6=$booking->discount??0;
      $booking_price->save();
  }
  catch(\Exception $e)
  {
      $error_string = $e->getMessage();
      $error = \Illuminate\Validation\ValidationException::withMessages([
        "you have an error $error_string"

      ]);
      throw new $error;
  }
  }

  public function updated(Booking $booking)
{
   try
   {
       $price=  Pricing::find($booking->vehicle_id);
  $booking_price = BookingPrice::where('booking_id',$booking->id)->first();

  if($booking_price){
    $booking_price->booking_id=$booking->id;
    $booking_price->cost1=$price->dailyrate;
    $booking_price->cost2=$price->dailydriverrate ;
    $booking_price->cost3=$price->selfdrive;
    $booking_price->cost4=$price->discount;
    $booking_price->cost5=$price->costofdelivery ;
    $booking_price->cost6=$booking->discount??0;
    $booking_price->save();

  }else{
    $booking_price = New BookingPrice;
    $booking_price->booking_id=$booking->id;
    $booking_price->cost1=$price->dailyrate;
    $booking_price->cost2=$price->dailydriverrate ;
    $booking_price->cost3=$price->selfdrive;
    $booking_price->cost4=$price->discount;
    $booking_price->cost5=$price->costofdelivery ;
    $booking_price->cost6=$booking->discount??0;
    $booking_price->save();
  }



}
catch(\Exception $e)
{
    $error_string = $e->getMessage();
    $error = \Illuminate\Validation\ValidationException::withMessages([
      "you have an error $error_string"

    ]);
    throw new $error;
}
}
}
