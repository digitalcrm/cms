<?php

namespace Database\Factories;

use App\BookingEvent;
use App\BookingService;
use App\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingEventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BookingEvent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'event_name' => $this->faker->name,
            'user_id' => User::factory(),
            'booking_service_id' => BookingService::factory(),
            'duration' => $this->faker->randomElement(array ('1 Hours','2 Hours')),
            'price' => $this->faker->numberBetween(500, 1000),
            'event_description' => $this->faker->text,
        ];
    }
}
