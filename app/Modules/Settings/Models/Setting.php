<?php

namespace App\Modules\Settings\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
  protected $guarded = array('id');
protected $fillable = array('key_name','key_value','key_desc');

public static $rules = array(
 'key_name' => 'required',
 'key_value' => 'required',
 'key_desc' => 'required',

);

public static $messages = array(
'key_name.required' => 'Key Name required',
'key_value.required' => 'Key Value required',
'key_desc.required' => 'Description required',

);
}
