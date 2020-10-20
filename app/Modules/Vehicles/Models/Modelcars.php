<?php

namespace App\Modules\Vehicles\Models;

use Illuminate\Database\Eloquent\Model;

class Modelcars extends Model
{
	 protected $table = 'models';

   protected $guarded = array('id');
  protected $fillable = array('model_name','make_id');

   public static $rules = array(
    'model_name' => 'required',
    'make_id' => 'required',
  );

  public static $messages = array(
   'model_name.required' => 'Name required',
'make_id.required' => 'Car Make required',
   );
	 public function car_make()
	 {
			 return $this->belongsTo(Make::class,'make_id');
	 }
	 
}
