<?php

namespace App\Modules\Vehicles\Models;

use Illuminate\Database\Eloquent\Model;

class Model extends Model
{
     protected $guarded = array('id');
     protected $fillable = array('model_name');

   public static $rules = array(
    'model_name' => 'required',

  );

  public static $messages = array(
   'model_name.required' => 'Name required',

   );

   public function car_make()
   {
       return $this->belongsTo(Make::class,'make_id');
   }
}
