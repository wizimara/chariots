<?php

namespace App\Modules\Vehicles\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
     protected $guarded = array('id');
  protected $fillable = array('vehicle_name','model_id','make_id','category_id','year_model','no_plate','color','passengers','tracker','status');
  
   public static $rules = array(
    'vehicle_name' => 'required',
	'model_id' => 'required',
	'make_id' => 'required',
	'category_id' => 'required',
	'year_model' => 'required',
	'no_plate' => 'required',
	'color' => 'required',
   'passengers' => 'required',
  );
  
  public static $messages = array(
   'vehicle_name.required' => 'Name required',
   'model_id.required' => 'Vehicle model required',
   'make_id.required' => 'Vehicle make required',
   'category_id.required' => 'Vehicle category required',
   'year_model.required' => 'Year of manufature required',
   'no_plate.required' => 'Number plate required',
   'color.required' => 'Color required',
   'passengers.required' => 'Number of passengers required',

   ); 
}