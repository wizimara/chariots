<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use App\Modules\Vehicles\Models\Modelcars;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Modelcars::class, function (Faker $faker) {
    return [
        'model_name'       => $faker->name,
        'make_id'       => 1,
    ];
});
