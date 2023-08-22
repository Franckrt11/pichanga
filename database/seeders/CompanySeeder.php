<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::insert([
            [
                'name' => 'Asociación Canchas EIRL',
                'ruc' => '20123123123',
                'email' => 'informes@asociacioncanchas.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status' => TRUE,
                'photo' => NULL,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Canchas Don Sebas SRL',
                'ruc' => '20987987987',
                'email' => 'gerencia@donsebas.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status' => TRUE,
                'photo' => NULL,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
