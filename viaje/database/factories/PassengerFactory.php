<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Ward;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Passenger>
 */
class PassengerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Create fake data for Passenger model
            'firstname' => $this->faker->firstName(),
            'middlename' => $this->faker->optional()->firstName(),
            'lastname' => $this->faker->lastName(),
            'dni' => $this->faker->unique()->numerify('##########'),
            'is_member' => $this->faker->boolean(80),
            'membership' => $this->faker->optional()->bothify('M-#####'),
            'is_endowed' => $this->faker->optional()->boolean(80),
            'gender' => $this->faker->randomElement(['Hombre', 'Mujer']),
            'birthdate' => $this->faker->date(),
            'is_authorized' => $this->faker->boolean(80),
            'ward_id' => null,
            'user_id' => null,
            'trip_id' => null,
            'seat_id' => null,
        ];
    }
}
