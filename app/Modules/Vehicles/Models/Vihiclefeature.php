<?php

namespace App\Modules\Vehicles\Models;

use Illuminate\Database\Eloquent\Model;

class Vehiclefeature extends Model
{
  protected $table = 'vehicles';
   
 public function features()
    {
        return $this->belongsToMany('App\Feature','features');
    }  
}
