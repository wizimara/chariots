<?php

namespace App\Modules\Renting\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
  protected $guarded = array('id');
protected $fillable = array('vehicle_id','user_id','booking_status','date_of_booking'
,'starting_date_of_use','end_date_of_use','driver_option','booked_by'
);

 public static $rules = array(
  'vehicle_id' => 'required',
  'user_id' => 'required',
  'booking_status' => 'required',
  'date_of_booking' => 'required',
  'starting_date_of_use' => 'required',
  'end_date_of_use' => 'required',
  'driver_option' => 'required',
  'booked_by' => 'required',
);

public static $messages = array(
 'vehicle_id.required' => ' Vehicle required',
 'user_id.required' => ' Client name required',
 'booking_status.required' => 'Booking Status required',
 'date_of_booking.required' => 'Date of Booking required',
 'starting_date_of_use.required' => 'Starting date of use required ',
 'end_date_of_use.required' => 'End Date of use required',
 'driver_option.required' => 'Driver Option required',
 'booked_by.required' => 'Booked By required',

 );
}
