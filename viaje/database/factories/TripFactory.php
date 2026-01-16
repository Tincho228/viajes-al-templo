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
            $user = User::whereNotNull('stake_id')->inRandomOrder()->first() ?? User::factory()->create();
        return [
            'departure' => $this->faker->dateTime(),
            'location' => $this->faker->city(),
            'description' => $this->faker->text(),
            'capacity' => 60,
            'cost' => $this->faker->randomFloat(2, 10, 1000),
            'user_id' => $user->id,
            'ward_id' => Ward::where('stake_id', $user->stake_id)->inRandomOrder()->first()?->id 
                     ?? Ward::factory()->create(['stake_id' => $user->stake_id])->id,
        ];
    }
}
