<?php

namespace App\Modules\Renting\Models;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
  protected $guarded = array('id');
protected $fillable = array('vehicle_id','dailyrate','dateranges','selfdrive','dailydriverrate','discount',
'costofdelivery');

public static $rules = array(
 'vehicle_id' => 'required|unique:pricings',
 'dailyrate' => 'required',
 'dailydriverrate'=>'required',
 'costofdelivery'=>'required',
 'start_date'=>'required',
 'end_date'=>'required',

);

public static $messages = array(
'vehicle_id.required' => 'Vehicle required',
'vehicle_id.unique' => 'This Vehicle is already Priced',
'dailyrate.required' => 'Daily Rate required',
'dailydriverrate.required' => 'Driver Daily Rate required',
'costofdelivery.required' => 'Cost of delivering car per km required',

);
public function car()
{
    return $this->belongsTo('App\Modules\Vehicles\Models\Vehicle','vehicle_id');
}
public function schedules()
{
    return $this->hasMany(Carschedule::class,'pricing_id');
}
public function car_available_dates()
{
    return $this->hasMany(CarAvailableDate::class,'pricing_id');
}
}
