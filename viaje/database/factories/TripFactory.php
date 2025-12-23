<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Ward;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trip>
 */
class TripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'departure' => $this->faker->dateTime(),
            'location' => $this->faker->city(),
            'description' => $this->faker->text(),
            'capacity' => $this->faker->numberBetween(1, 100),
            'cost' => $this->faker->randomFloat(2, 10, 1000),
            'user_id' => User::all()->random()->id,
            'ward_id' => Ward::all()->random()->id,
        ];
    }
}
