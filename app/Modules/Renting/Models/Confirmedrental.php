<?php

namespace App\Modules\Renting\Models;

use Illuminate\Database\Eloquent\Model;

class Confirmedrental extends Model
{
  protected $guarded = array('id');
 protected $casts = [ 'pick_up_date' => 'datetime','pick_up_time' => 'datetime'];
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
 public function booking()
 {
     return $this->belongsTo(Booking::class,'booking_id');
 }
}
