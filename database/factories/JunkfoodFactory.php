<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Junkfood>
 */
class JunkfoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' =>fake()->randomElement([1,2,3,4,5,6,7,8,9,10]),
            'name' => fake()->randomElement(['cracklings','patata','piatos','nova','cheesecrunch']),
            'size' => fake()->randomElement(['100grams','200grams','150grams','160grams','170grams','180grams','110grams']),
            'price' => fake()->randomElement([100,200,500,300,700,100,12,23]),
            'quantity' => fake()->randomDigitNotNull(),
        ];
    }
}
