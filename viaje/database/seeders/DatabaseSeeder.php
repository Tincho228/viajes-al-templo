<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Stake;
use App\Models\Ward;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => 'password',
                'email_verified_at' => now(),
            ]
        );
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
    ]);
    }
}
