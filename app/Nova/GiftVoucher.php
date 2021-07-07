<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Epartment\NovaDependencyContainer\HasDependencies;
use Epartment\NovaDependencyContainer\NovaDependencyContainer;
use Laravel\Nova\Http\Requests\NovaRequest;

class GiftVoucher extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Modules\Renting\Models\GiftVoucher::class;
    public static $group = 'Renting';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'voucher_number';

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
            Text::make('Voucher Number', 'voucher_number')->hideWhenCreating()->
            hideWhenUpdating(),
            BelongsTo::make('Category','voucher_category',\App\Nova\VoucherCategory::class),
            Select::make('Percentage', 'is_percentage')
                  ->options([
                      'Yes' => 'Yes',
                      'No' => 'No',
                  ])->default('Yes'),
                  NovaDependencyContainer::make([
                      Text::make('Percentage %', 'percentage')->default(0)
                  ])->dependsOn('is_percentage', 'Yes'),

                  NovaDependencyContainer::make([
                      Text::make('Amount', 'amount')->default(0)
                  ])->dependsOn('is_percentage', 'No'),
            DateTime::make('Expiry Date','expiry_date')->format('DD-MM-YYYY h:mm:ss')->nullable(),

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
