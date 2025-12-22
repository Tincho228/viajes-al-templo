<?php

namespace Database\Factories;

use App\Models\Ordinance;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'time' => $this->faker->unique()->time(),
            'capacity' => 15,
            'ordinance_id' => Ordinance::all()->random()->id,
        ];
    }
}
