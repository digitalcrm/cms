<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BookingEvent;
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

$factory->define(BookingEvent::class, function (Faker $faker) {
    return [
        'event_name' => $this->faker->name,
        'user_id' => $this->faker->numberBetween(1,2),
        'booking_service_id' => $this->faker->numberBetween(1, 2),
        'duration' => $this->faker->randomElement(array ('1 Hours','2 Hours')),
        'price' => $this->faker->numberBetween(500, 1000),
        'event_description' => $this->faker->text,
    ];
});
