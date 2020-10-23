<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Http\Requests\NovaRequest;

class Model extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
     public static $model = \App\Modules\Vehicles\Models\Modelcars::class;
     public static $group = 'Vehicles';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
     public function title()
 {
     return $this->model_name.' - '.$this->car_make->make_name;
 }


    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id','model_name',
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
            Text::make('Name','model_name')
                ->sortable()
                ->rules('required', 'max:255'),
            BelongsTo::make('Make','car_make', \App\Nova\Make::class),
            BelongsToMany::make('Categories','category_models')
            ->actions(function () {
             return [
            new Actions\MarkAsActive,
        ];
    }),
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
