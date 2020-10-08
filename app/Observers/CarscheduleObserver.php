<?php

namespace App\Observers;
use Carbon\CarbonPeriod;
use App\Modules\Renting\Models\CarSchedule;
use App\Modules\Renting\Models\CarAvailableDate;

class CarscheduleObserver
{
    /**
     * Handle the car schedule "created" event.
     *
     * @param  \App\CarSchedule  $carSchedule
     * @return void
     */
    public function saving(CarSchedule $carSchedule)
    {
        try {



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
    public function created(CarSchedule $carSchedule)
  {
    try {

    $carSchedule->available_dates()->delete();

      $startDate = new \Carbon\Carbon($carSchedule->start_date);
      $endDate = new \Carbon\Carbon($carSchedule->end_date);

      $t_daterange = CarbonPeriod::create($startDate, $endDate);
      $all_dates = [];

      foreach ($t_daterange as $monthdate) {
      $all_dates[] = $monthdate->format('Y-m-d');
     }

      foreach($all_dates as $avaliabledate)
      {

      $avaliable =new CarAvailableDate;
      $avaliable->pricing_id =$carSchedule->pricing_id;
      $avaliable->schedule_id =$carSchedule->id;
      $avaliable->available_date =$avaliabledate;
      $avaliable->save();
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

  public function updated(CarSchedule $carSchedule)
{
  try {

  $carSchedule->available_dates()->delete();

    $startDate = new \Carbon\Carbon($carSchedule->start_date);
    $endDate = new \Carbon\Carbon($carSchedule->end_date);

    $t_daterange = CarbonPeriod::create($startDate, $endDate);
    $all_dates = [];

    foreach ($t_daterange as $monthdate) {
    $all_dates[] = $monthdate->format('Y-m-d');
   }

    foreach($all_dates as $avaliabledate)
    {

    $avaliable =new CarAvailableDate;
    $avaliable->pricing_id =$carSchedule->pricing_id;
    $avaliable->schedule_id =$carSchedule->id;
    $avaliable->available_date =$avaliabledate;
    $avaliable->save();
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



    /**
     * Handle the car schedule "deleted" event.
     *
     * @param  \App\CarSchedule  $carSchedule
     * @return void
     */
    public function deleted(CarSchedule $carSchedule)
    {
      try {
        $carSchedule->available_dates()->delete();
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


}
