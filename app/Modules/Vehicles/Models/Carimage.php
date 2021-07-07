<?php

namespace App\Modules\Vehicles\Models;

use Illuminate\Database\Eloquent\Model;

class Carimage extends Model
{
    protected $guarded = array('id');
  protected $fillable = array('vehicle_id','title','url','featured');

   public static $rules = array(
    'url' => 'required | mimes:jpeg,jpg,png',

  );

  public static $messages = array(
   'url.required' => 'No Image selected [jpeg,jpg,png]',
 'url.mimes' => ' Image should be [jpeg,jpg,png]',
   );

   public function vehicle_image()
  {
      return $this->belongsTo(Vehicle::class,'vehicle_id');
  }
}
