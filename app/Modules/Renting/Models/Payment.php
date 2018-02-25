<?php

namespace App\Modules\Renting\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
  protected $guarded = array('id');
protected $fillable = array('confirmed_rentals_id','amount_paid','balance','payment_gateway'
);

 public static $rules = array(
  'confirmed_rentals_id' => 'required',
  'amount_paid' => 'required',

  'payment_gateway' => 'required',

);

public static $messages = array(
 'confirmed_rentals_id.required' => 'Confirmed Booking Detials required',
 'amount_paid.required' => ' Amount Paid required',

 'payment_gateway.required' => 'Payment Gateway required',

 );
}
