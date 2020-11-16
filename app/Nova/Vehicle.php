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
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\BelongsToMany;
use Manmohanjit\BelongsToDependency\BelongsToDependency;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\HasOne;

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
     public function title()
 {
     return $this->car_model->model_name.' - '.$this->no_plate;
 }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'status','year_model','no_plate','color',
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
            ID::make(__('ID'), 'id')->sortable()->hideFromIndex(),
            Boolean::make('Status','status')
       ->trueValue('Yes')
       ->falseValue('No'),
            BelongsTo::make('Make','car_make',\App\Nova\Make::class),
           BelongsToDependency::make('Model','car_model',\App\Nova\Model::class)
      ->dependsOn('car_make', 'make_id'),
        Text::make('year','year_model')
                ->sortable()
                ->rules('required', 'max:255'),
            Text::make('Plate','no_plate')
                ->sortable()
                ->rules('required', 'max:255')
                ->creationRules('unique:vehicles,no_plate')
                ->updateRules('unique:vehicles,no_plate,{{resourceId}}'),
                BelongsTo::make('Color','car_color', \App\Nova\Color::class),
            Text::make('Passengers','passengers')
                ->sortable()
                ->rules('required', 'max:255'),
                Boolean::make('Tracker','tracker')
           ->trueValue('Yes')
           ->falseValue('No')->hideFromIndex(),
            Select::make('Transmission','transimition')->options([
            'Manual' => 'Manual',
            'Auto' => 'Auto',
             ])->hideFromIndex(),
             Select::make('Fuel Type','fuel_type')->options([
             'Petrol' => 'Petrol',
             'Diesel' => 'Diesel',
             'Hybrid' => 'Hybrid',
             'Electric ' => 'Electric',
              ])->hideFromIndex(),
           Select::make('Insurance','insurance_type')->options([
           'Comprehensive' => 'Comprehensive',
           'Third party' => 'Third party',
            ])->hideFromIndex(),
            DateTime::make('Insurance Expiry Date','insurance_expiry')->format('DD-MM-YYYY')
            ->pickerFormat('Y-m-d')->nullable()->hideFromIndex(),
            Textarea::make('Description','vehicle_desc'),
            BelongsTo::make('Location','car_location', \App\Nova\Location::class),
            HasMany::make('Carimages','vehicle_images',\App\Nova\Carimage::class),
            BelongsToMany::make('Features')
            ->actions(function () {
             return [
            new Actions\MarkAsActive,
        ];
    }),
      HasOne::make('PRICING','pricing',\App\Nova\Pricing::class)

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
