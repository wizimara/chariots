<?php

namespace App\Observers;

use App\Modules\Renting\Models\GiftVoucher;

class GiftVoucherObserver
{
    /**
     * Handle the gift voucher "created" event.
     *
     * @param  \App\GiftVoucher  $giftVoucher
     * @return void
     */
     public function creating(GiftVoucher $giftVoucher)
     {
          try {
            $giftVoucher->voucher_number=uniqid();
          }
          catch(\Exception $e)
          {
              $error_string = $e->getMessage();
              $error = \Illuminate\Validation\ValidationException::withMessages([
                "you have an error $error_string"

              ]);
              throw $error;
          }
         //
     }
    public function created(GiftVoucher $giftVoucher)
    {
        //
    }

    /**
     * Handle the gift voucher "updated" event.
     *
     * @param  \App\GiftVoucher  $giftVoucher
     * @return void
     */
    public function updated(GiftVoucher $giftVoucher)
    {
        //
    }

    /**
     * Handle the gift voucher "deleted" event.
     *
     * @param  \App\GiftVoucher  $giftVoucher
     * @return void
     */
    public function deleted(GiftVoucher $giftVoucher)
    {
        //
    }

    /**
     * Handle the gift voucher "restored" event.
     *
     * @param  \App\GiftVoucher  $giftVoucher
     * @return void
     */
    public function restored(GiftVoucher $giftVoucher)
    {
        //
    }

    /**
     * Handle the gift voucher "force deleted" event.
     *
     * @param  \App\GiftVoucher  $giftVoucher
     * @return void
     */
    public function forceDeleted(GiftVoucher $giftVoucher)
    {
        //
    }
}
