<?php

namespace App\Observers;

use App\Modules\Renting\Models\Confirmedrental;
use App\Modules\Renting\Models\Booking;
use App\Modules\Renting\Models\BookedDate;

class ConfirmedrentalObserver
{
    /**
     * Handle the confirmedrental "created" event.
     *
     * @param  \App\Confirmedrental  $confirmedrental
     * @return void
     */
    public function created(Confirmedrental $confirmedrental)
    {
      $booking1 =Booking::find($confirmedrental->booking_id);
      $startDate = new \Carbon\Carbon($booking1->starting_date_of_use);
      $endDate = new \Carbon\Carbon($booking1->end_date_of_use);
      $all_dates = array();
      $t_daterange = CarbonPeriod::create($startDate, $endDate);
      foreach ($t_daterange as $monthdate) {
      $all_dates[] = $monthdate->format('Y-m-d');
     }

        $availabledates =CarAvailableDate::where('pricing_id',$booking1->vehicle_id)->pluck('available_date')->all();
        $result2= array_intersect($availabledates,   $all_dates);
        if(empty($result2))
        {
          $string2='';
          foreach ($all_dates as $value){
          $string2=  \Carbon\Carbon::parse($value)->format('d-m-Y ').' , ';
          }
         throw new Exception($string2);
        }

        $bookeddates =BookedDate::where('pricing_id',$booking1->vehicle_id)->pluck('booked_date')->all();
        $result = array_intersect($bookeddates,   $all_dates);
        if(!empty($result))
        {
        $string='';
        foreach ($result as $value){
        $string=  \Carbon\Carbon::parse($value)->format('d-m-Y ').' , ';
        }
       throw new Exception($string);

    }

    $booking1->booking_status='Confirmed';
    $booking1->save();

    foreach($all_dates as $bookdate)
     {
       $bookingdate =new BookedDate;
       $bookingdate->booking_id =$booking1->id;
       $bookingdate->pricing_id =$booking1->vehicle_id;
       $bookingdate->booked_date =$bookdate;
       $bookingdate->save();
      }
  }

    /**
     * Handle the confirmedrental "updated" event.
     *
     * @param  \App\Confirmedrental  $confirmedrental
     * @return void
     */
    public function updated(Confirmedrental $confirmedrental)
    {
        //
    }

    /**
     * Handle the confirmedrental "deleted" event.
     *
     * @param  \App\Confirmedrental  $confirmedrental
     * @return void
     */
    public function deleted(Confirmedrental $confirmedrental)
    {
        //
    }

    /**
     * Handle the confirmedrental "restored" event.
     *
     * @param  \App\Confirmedrental  $confirmedrental
     * @return void
     */
    public function restored(Confirmedrental $confirmedrental)
    {
        //
    }

    /**
     * Handle the confirmedrental "force deleted" event.
     *
     * @param  \App\Confirmedrental  $confirmedrental
     * @return void
     */
    public function forceDeleted(Confirmedrental $confirmedrental)
    {
        //
    }
}
