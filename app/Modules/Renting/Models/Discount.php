<?php

namespace App\Modules\Renting\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
  public function vehicle_pricing()
  {
      return $this->belongsTo('App\Modules\Renting\Models\Pricing','pricing_id');
  }
}
