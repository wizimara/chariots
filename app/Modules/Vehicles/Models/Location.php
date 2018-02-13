<?php

namespace App\Modules\Vehicles\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $guarded = array('id');
  protected $fillable = array('location_name');
  
   public static $rules = array(
    'location_name' => 'required',

  );
  
  public static $messages = array(
   'location_name.required' => 'Name required',

   ); 
}
