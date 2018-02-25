<?php

namespace App\Modules\Renting\Models;

use Illuminate\Database\Eloquent\Model;

class Confirmedrental extends Model
{
  protected $guarded = array('id');
protected $fillable = array('booking_id','payment_status','car_pickup_status','owner_pickup_confirmation'
,'pick_up_time','pick_up_date'
);

 public static $rules = array(
  'booking_id' => 'required',
  'payment_status' => 'required',
  'car_pickup_status' => 'required',
  'owner_pickup_confirmation' => 'required',
  'pick_up_time' => 'required',
'pick_up_date' => 'required',
);

public static $messages = array(
 'booking_id.required' => ' Booking Detials required',
 'payment_status.required' => ' Payment Status required',
 'car_pickup_status.required' => 'Car Pickup Status required',
 'owner_pickup_confirmation.required' => 'Owner Pickup Confirmation required',
 'pick_up_time.required' => 'Pickup Time required ',
'pick_up_date.required' => 'Pickup Date required ',
 );
}
