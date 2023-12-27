<?php

namespace Database\Seeders;

use App\Models\Field;
use Illuminate\Database\Seeder;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Field::insert([
            [
                'name' => 'La Cancha',
                'phone' => '999888777',
                'mobile' => '987654321',
                'parking' => '5',
                'size' => '20x30',
                'type' => 'Grass',
                'players' => '14',
                'games' => '["5v5","8v8","7v7"]',
                'country' => 'Perú',
                'city' => 'Lima',
                'district' => 'Lima',
                'address' => 'Av. Wilson',
                'map' => '-12.06732218,-77.03372348',
                'portrait' => 'company-field-1694942474.jpg',
                'active' => TRUE,
                'company_id' => 1,
                'created_at' => now(),
                'updated_at' => now()

            ],
            [
                'name' => 'La de Loza',
                'phone' => '999888777',
                'mobile' => '987654321',
                'parking' => '8',
                'size' => '20x30',
                'type' => 'Cemento',
                'players' => '22',
                'games' => '["5v5","8v8","11v11"]',
                'country' => 'Perú',
                'city' => 'Lima',
                'district' => 'Lima',
                'address' => 'Av. Mexico',
                'map' => '-12.06860508,-77.02290933',
                'portrait' => 'company-field-1694942485.jpg',
                'active' => TRUE,
                'company_id' => 1,
                'created_at' => now(),
                'updated_at' => now()

            ],
        ]);
    }
}
