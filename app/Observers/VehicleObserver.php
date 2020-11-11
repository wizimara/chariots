<?php

namespace App\Observers;

use App\Modules\Vehicles\Models\Vehicle;

class VehicleObserver
{
    /**
     * Handle the = vehicle "created" event.
     *
     * @param  \App\Vehicle  $Vehicle
     * @return void
     */

     public function creating(Vehicle $vehicle)
     {
         try {

           $today =date('Y-m-d');
           if($today> $vehicle->insurance_expiry)
           {
         $error=    'Insurance Expiry Date has already passed: '. \Carbon\Carbon::parse($vehicle->insurance_expiry)->format('d-m-Y ');

             throw new \Exception($error);

           }
   $vehicle->no_plate=strtoupper(str_replace(' ', '', $vehicle->no_plate));

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
    public function created(Vehicle $vehicle)
    {
      
    }

    /**
     * Handle the = vehicle "updated" event.
     *
     * @param  \App\=Vehicle  $=Vehicle
     * @return void
     */
    public function updating(Vehicle $vehicle)
    {
      try {
         $vehicle->no_plate=strtoupper(str_replace(' ', '', $vehicle->no_plate));

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

    /**
     * Handle the = vehicle "deleted" event.
     *
     * @param  \App\Vehicle  $Vehicle
     * @return void
     */
    public function deleted(Vehicle $Vehicle)
    {
        //
    }

    /**
     * Handle the = vehicle "restored" event.
     *
     * @param  \App\Vehicle  $Vehicle
     * @return void
     */
    public function restored(Vehicle $Vehicle)
    {
        //
    }

    /**
     * Handle the = vehicle "force deleted" event.
     *
     * @param  \App\Vehicle  $Vehicle
     * @return void
     */
    public function forceDeleted(Vehicle $Vehicle)
    {
        //
    }
}
