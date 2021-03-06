<?php

namespace App\Modules\Vehicles\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
     protected $guarded = array('id');
  protected $fillable = array('feature_name');
  
   public static $rules = array(
    'feature_name' => 'required',

  );
  
  public static $messages = array(
   'feature_name.required' => 'Name required',

   );
   
   public function vehicles()
   {
      return $this->belongsToMany('App\Modules\Vehicles\Vehicle','feature_vehicles','feature_id','vehicle_id');
   }
}
