<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BookingService;
use Faker\Generator as Faker;

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

$factory->define(BookingService::class, function (Faker $faker) {
    return [
        'service_name' => $faker->name,
    ];
});
