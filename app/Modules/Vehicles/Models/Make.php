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
}
