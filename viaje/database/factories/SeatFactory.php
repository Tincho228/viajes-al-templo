<?php

namespace Database\Factories;

use App\Models\Passenger;
use App\Models\Trip;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seat>
 */
class SeatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number' => null, // // This will be filled in the seeder
            'trip_id' => null, // This will be filled in the seeder
            'user_id' => null, // This will be filled in the seeder
        ];
    }
}
