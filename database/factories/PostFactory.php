<?php

namespace Database\Factories;

use App\Category;
use App\Post;
use App\Subcategory;
use App\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(10),
            'user_id' => User::factory(),
            'category_id'=> $this->faker->numberBetween(1, 5),
            'body' => $this->faker->sentence(),
        ];
    }
}
