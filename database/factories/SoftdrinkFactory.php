<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Softdrink>
 */
class SoftdrinkFactory extends Factory
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
            'name' => fake()->randomElement(['coke','sprite','royal','rc','mountain dew']),
            'size' => fake()->randomElement(['10oz','20oz','1liter','1.5liter','17oz','2liter','11oz']),
            'price' => fake()->randomElement([100,200,500,300,700,100,12,23]),
            'quantity' => fake()->randomDigitNotNull(),
        ];
    }
}
