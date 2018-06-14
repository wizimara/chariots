<?php

namespace App\Modules\Renting\Models;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
  protected $guarded = array('id');
protected $fillable = array('vehicle_id','dailyrate','dateranges','selfdrive','dailydriverrate','discount',
'costofdelivery');

public static $rules = array(
 'vehicle_id' => 'required',
 'dailyrate' => 'required',
 'dailydriverrate'=>'required',
 'costofdelivery'=>'required',

);

public static $messages = array(
'vehicle_id.required' => 'Vehicle required',
'dailyrate.required' => 'Daily Rate required',
'dailydriverrate.required' => 'Driver Daily Rate required',
'costofdelivery.required' => 'Cost of delivering car per km required',

);

}
