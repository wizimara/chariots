<?php

namespace App\Modules\Vehicles\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
     protected $guarded = array('id');
     protected $casts = [ 'insurance_expiry' => 'date:Y-m-d'];
  protected $fillable = array('vehicle_name','model_id','category_id','year_model','no_plate','color','passengers','tracker','status','transimition','insurance_type','insurance_expiry','vehicle_desc','user_id','location');

   public static $rules = array(
	'model_id' => 'required',
	'category_id' => 'required',
	'year_model' => 'required',
	'no_plate' => 'required|unique:vehicles',
	'color' => 'required',
   'passengers' => 'required',
   'user_id' => 'required',
  'insurance_expiry' => 'required',



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
   'user_id.required'  => 'Car Owner Required',

   );

   public function features()
    {
        return $this->belongsToMany('App\Modules\Vehicles\Models\Feature','feature_vehicle','vehicle_id','feature_id');
    }
    public function car_model()
    {
        return $this->belongsTo(Modelcars::class,'model_id');
    }
    public function car_location()
    {
        return $this->belongsTo(Location::class,'location');
    }
    public function car_make()
    {
        return $this->belongsTo(Make::class,'make_id');
    }
    public function vehicle_images()
    {
        return $this->hasMany(Carimage::class,'vehicle_id');
    }
    public function pricing()
    {
        return $this->hasOne('App\Modules\Renting\Models\Pricing','vehicle_id');
    }
    public function car_color()
    {
        return $this->belongsTo(Color::class,'color');
    }
}
