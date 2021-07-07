<?php

namespace App\Modules\Renting\Models;
use Illuminate\Database\Eloquent\Model;
class CarSchedule extends Model
{
   protected $casts = [ 'end_date' => 'datetime','start_date' => 'datetime'];
    public static $rules = array(
    'start_date' => 'required',
    'end_date' => 'required',
    );

    public function pricing()
    {
      return $this->belongsTo('App\Modules\Renting\Models\Pricing','pricing_id');
    }

    public function available_dates()
    {
        return $this->hasMany(CarAvailableDate::class,'schedule_id');
    }

}
