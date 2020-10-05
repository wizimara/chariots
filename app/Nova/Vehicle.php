<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\HasMany;

use Laravel\Nova\Http\Requests\NovaRequest;

class Vehicle extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Modules\Vehicles\Models\Vehicle::class;
    public static $group = 'Vehicles';

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
            BelongsTo::make('Model','car_model', \App\Nova\Model::class),
            BelongsTo::make('Category','car_category', \App\Nova\Category::class),
            Text::make('year','year_model')
                ->sortable()
                ->rules('required', 'max:255'),
            Text::make('Plate','no_plate')
                ->sortable()
                ->rules('required', 'max:255'),
            Text::make('Color','color')
                ->sortable()
                ->rules('required', 'max:255'),
            Text::make('Passengers','passengers')
                ->sortable()
                ->rules('required', 'max:255'),
            Boolean::make('Tracker','tracker')
            ->trueValue('On')
            ->falseValue('Off'),
            Boolean::make('Status','status')
            ->trueValue('On')
            ->falseValue('Off'),
            Select::make('Transmission','transimition')->options([
            '1' => 'Manual',
            '0' => 'Auto',
             ]),
           Select::make('Insurance','insurance_type')->options([
           'Comprehensive' => 'Comprehensive',
           'Third party' => 'Third party',
            ]),
            Textarea::make('Description','vehicle_desc'),
            BelongsTo::make('Location','car_location', \App\Nova\Location::class),
            //HasMany::make('vehicle_images'),

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
