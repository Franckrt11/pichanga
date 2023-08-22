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
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'birth' => '1984-02-19',
                'sex' => 'male',
                'status' => TRUE,
                'photo' => NULL,
                'google_id' => NULL,
                'facebook_id' => NULL,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Juana',
                'lastname' => 'Perez',
                'email' => 'juanaperez@gmail.com',
                'phone' => '999888777',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'birth' => '1990-02-12',
                'sex' => 'female',
                'status' => TRUE,
                'photo' => NULL,
                'google_id' => NULL,
                'facebook_id' => NULL,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        User::factory()->count(50)->create();
    }
}
