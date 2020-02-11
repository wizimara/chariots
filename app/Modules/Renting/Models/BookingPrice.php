<?php

namespace App\Modules\Renting\Models;

use Illuminate\Database\Eloquent\Model;

class BookingPrice extends Model
{
   protected $table = 'booking_price';
   protected $guarded = array('id');
}
