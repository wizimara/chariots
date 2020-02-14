<?php

namespace App\Modules\Renting\Models;
use Illuminate\Database\Eloquent\Model;
class CarSchedule extends Model
{
  public static $rules = array(
   'start_date' => 'required',
   'end_date' => 'required',
 );
}
