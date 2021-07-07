<?php

namespace App\Modules\Renting\Models;

use Illuminate\Database\Eloquent\Model;

class GiftVoucher extends Model
{
  protected $casts = [ 'expiry_date' => 'datetime'];
  public function voucher_category()
  {
      return $this->belongsTo(VoucherCategory::class,'category_id');
  }
}
