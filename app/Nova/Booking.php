<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Booking extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Modules\Renting\Models\Booking::class;
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
            BelongsTo::make('Vihicle','vehicle_pricing', \App\Nova\Pricing::class),
            BelongsTo::make('User','client', \App\Nova\User::class),
            DateTime::make('Date of Booking','date_of_booking')->format('DD-MM-YYYY')
            ->pickerFormat('Y-m-d')
            ->rules('required'),
            DateTime::make('Starting Date of Use','starting_date_of_use')->format('DD-MM-YYYY')
            ->pickerFormat('Y-m-d')->rules('required'),
            DateTime::make('End Date of Use','end_date_of_use')->format('DD-MM-YYYY')
            ->pickerFormat('Y-m-d')->rules('required'),
            Select::make('Drive Option','driver_option')->options([
            '0' => 'Driver',
            '1' => 'Self Drive',
             ]),
             Text::make('Total Cost','totalcost')
                 ->sortable()
                 ->rules('required', 'max:255')->default('0'),
            BelongsTo::make('Booked By','booked_by_user', \App\Nova\User::class),
            Select::make('Booked Status','booking_status')->options([
            'Booked' => 'Booked',
            'cancelled' => 'Cancelled',
             ]),

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
