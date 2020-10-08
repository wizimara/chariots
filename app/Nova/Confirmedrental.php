<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Datetime;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest;

class Confirmedrental extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Modules\Renting\Models\Confirmedrental::class;
      public static $group = 'Renting';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),
            BelongsTo::make('Vehicle','booking', \App\Nova\Booking::class),
            Select::make('Payment Status','payment_status')->options([
            '1' => 'Paid',
            '0' => 'Not Paid',
             ]),
             Select::make('Car Pickup Status','car_pickup_status')->options([
             '1' => 'Picked',
             '0' => 'Not yet Picked',
              ]),
              Select::make('Pickup Confirmation','owner_pickup_confirmation')->options([
              '1' => 'Yes',
              '0' => 'No',
               ]),
               DateTime::make('Pick Date','pick_up_date')->format('DD-MM-YYYY')
               ->pickerFormat('Y-m-d')->rules('required'),
               DateTime::make('Pick Up Time','pick_up_time')->format('DD-MM-YYYY h:mm:ss')
               ->pickerFormat('Y-m-d H:i:s')->nullable(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
