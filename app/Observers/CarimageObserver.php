<?php

namespace App\Observers;

use App\Modules\Vehicles\Models\Carimage;

class CarimageObserver
{
    /**
     * Handle the = carimage "created" event.
     *
     * @param  \App\Carimage  $Carimage
     * @return void
     */
     public function saving(Carimage $Carimage)
     {
       try {
         if($Carimage->featured=='YES')
         {
          Carimage::where('vehicle_id',$Carimage->vehicle_id)->update([
            'featured'=>'NO'
          ]);

         }


       }
       catch(\Exception $e)
       {
           $error_string = $e->getMessage();
           $error = \Illuminate\Validation\ValidationException::withMessages([
             "you have an error $error_string"

           ]);
           throw $error;
       }

     }
    public function created(Carimage $Carimage)
    {
        //
    }

    /**
     * Handle the = carimage "updated" event.
     *
     * @param  \App\Carimage  $Carimage
     * @return void
     */
    public function updated(Carimage $Carimage)
    {
        //
    }

    /**
     * Handle the = carimage "deleted" event.
     *
     * @param  \App\Carimage  $Carimage
     * @return void
     */
    public function deleted(Carimage $Carimage)
    {
        //
    }

    /**
     * Handle the = carimage "restored" event.
     *
     * @param  \App\Carimage  $Carimage
     * @return void
     */
    public function restored(Carimage $Carimage)
    {
        //
    }

    /**
     * Handle the = carimage "force deleted" event.
     *
     * @param  \App\Carimage  $Carimage
     * @return void
     */
    public function forceDeleted(Carimage $Carimage)
    {
        //
    }
}
