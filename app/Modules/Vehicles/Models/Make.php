<?php

namespace App\Modules\Vehicles\Models;

use Illuminate\Database\Eloquent\Model;

class Make extends Model
{
   protected $guarded = array('id');
  protected $fillable = array('make_name');

   public static $rules = array(
    'make_name' => 'required',

  );

  public static $messages = array(
   'make_name.required' => 'Name required',

   );

   public function make_models()
   {
       return $this->hasMany(Modelcars::class,'make_id');
   }
}
