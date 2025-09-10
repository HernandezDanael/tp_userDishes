<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use FakerRestaurant\Provider\en_US\Restaurant as RestaurantProvider;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dishe>
 */
class DisheFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition(): array
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new RestaurantProvider($faker));
        return [
            'name' => $faker->foodName(),
            'image' => fake()->imageUrl(360,360, 'food'),
            'user' => User::inRandomOrder()->first() ,
            'recipe' => fake()->paragraph(),
        ];
    }
}
