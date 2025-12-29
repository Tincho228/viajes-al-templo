<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Ordinance;
use App\Models\Passenger;
use App\Models\Seat;
use App\Models\User;
use App\Models\Stake;
use App\Models\Trip;
use App\Models\Ward;
use Illuminate\Database\Seeder;
use Mockery\Generator\StringManipulation\Pass\Pass;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        // ***** Seeding Stakes with some Mendoza Stakes ***** //

        Stake::factory()->createMany([
            [
                'name' => 'San Rafael',
                'address' => 'Maza 178, San Rafael, Mendozza',
            ],
            [
                'name' => 'Godoy Cruz',
                'address' => 'Cabildo 70, Godoy Cruz, Mendoza',
            ],
            [
                'name' => 'Guaymallen',
                'address' => 'Francisco de la Reta 376, San Jose, Mendoza',
            ],
            [
                'name' => 'Maipu',
                'address' => 'Maza 3127, General Gutierrez, Mendoza',
            ],
        ]);

        // ***** Seeding two email-verified Users ***** //

        $usuarios = [
            ['email' => 'admin@ejemplo.com', 'name' => 'Administrador'],
            ['email' => 'editor@ejemplo.com', 'name' => 'Editor'],
        ];

        foreach ($usuarios as $userData) {
            User::firstOrCreate(
                ['email' => $userData['email']], // Condición de búsqueda
                [
                    'name' => $userData['name'],
                    'password' => bcrypt('password'), // Siempre encripta la contraseña
                    'stake_id' => 2,
                    'email_verified_at' => now(),      // Salta la verificación de email
                ]
            );
        }

        // Creating 10 random users //
        
        User::factory(10)->create();
        
        // ***** Seeding Wards table with San Rafael Stake units ***** //
        Ward::factory()->createMany([
            [
                'name' => 'San Rafael 1', 
                'address' => 'Maza 178, San Rafael, Mendoza',
                'stake_id' => 1,
            ],
            [
                'name' => 'San Rafael 2',
                'address' => 'Maza 178, San Rafael, Mendoza',
                'stake_id' => 1,
            ],
            [
                'name' => 'San Rafael 3',
                'address' => 'Maza 178, San Rafael, Mendoza',
                'stake_id' => 1,
            ],
            [
                'name' => 'Mitre',
                'address' => 'Maza 178, San Rafael, Mendoza',
                'stake_id' => 1,
            ],
            [
                'name' => 'Ballofet',
                'address' => 'Av. Ballofet 1418, San Rafael, Mendoza',
                'stake_id' => 1,
            ],
            [
                'name' => 'Salto de las Rosas',
                'address' => 'Maza 178, San Rafael, Mendoza',
                'stake_id' => 1,
            ],
            [
                'name' => 'Parque El Molino',
                'address' => 'Maza 178, San Rafael, Mendoza',
                'stake_id' => 1,
            ],
            [
                'name' => 'Monte Coman',
                'address' => 'Maza 178, San Rafael, Mendoza',
                'stake_id' => 1,
            ],
            [
                'name' => 'Pacifico',
                'address' => 'Maza 178, Alvear, Mendoza',
                'stake_id' => 1,
            ],
            [
                'name' => 'Alvear 2',
                'address' => 'Maza 178, Alvear, Mendoza',
                'stake_id' => 1,
            ],
            [
                'name' => 'Pellegrini',
                'address' => 'Maza 178, Alvear, Mendoza',
                'stake_id' => 1,
            ],
            [
                'name' => 'Malargue',
                'address' => 'Maza 178, Malargue, Mendoza',
                'stake_id' => 1,
            ],
            [
                'name' => 'Estaca San Rafael',
                'address' => 'Maza 178, Malargue, Mendoza',
                'stake_id' => 1,
            ],
        ]);

        Ward::factory(20)->create();

        // Seeding Passengers table with 60 records
        Passenger::factory(60)->create();

        // Seeding Ordinances table with important temple ordinances
        Ordinance::factory()->createMany([
            // For representatives
            [
                'name' => 'Bautismo',
            ],
            [
                'name' => 'Iniciatoria',
            ],
            [
                'name' => 'Investidura',
            ],
            [
                'name' => 'Sellamiento',
            ],
            // Personal ordinances
             [
                'name' => 'Ordenanzas personales',
            ],
        ]);

         // Seeding Appointments table with 10 records
        Appointment::factory(10)->create();

        // Seeding Trips table with 10 records
        Trip::factory(10)->create();

        // Seeding Seats table with 60 records
        // 1. Fetchin 5 trips
        $trips = Trip::inRandomOrder()->take(10)->get();

        foreach ($trips as $trip) {
            for ($i = 1; $i <= $trip->capacity; $i++) {
                Seat::create([
                    'number'  => $i,
                    'trip_id' => $trip->id,
                    'user_id' => $trip->user_id,
                ]);
            }
            //$passengers = Passenger::inRandomOrder()->take(15)->get();

            // foreach ($passengers as $index => $passenger) {
            //     Seat::create([
            //         'number'       => $index + 1, // Reset 
            //         'passenger_id' => $passenger->id,
            //         'trip_id'      => $trip->id,
            //     ]);
            // }
        }
    }
}
