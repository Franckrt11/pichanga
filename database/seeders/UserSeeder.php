<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Alexander',
                'lastname' => 'Pomareda',
                'email' => 'aerastudio@gmail.com',
                'phone' => '991705138',
                'photo' => 'user-avatar-1697648760.jpg',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'district' => 'Cercado de Lima',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Juana',
                'lastname' => 'Perez',
                'email' => 'juanaperez@gmail.com',
                'phone' => '999888777',
                'photo'=> NULL,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'district' => 'Cercado de Lima',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        // User::factory()->count(18)->create();
    }
}
