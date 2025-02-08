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
                'size' => '20x30',
                'type' => 'Grass',
                'players' => '14',
                'games' => '["5v5","8v8","7v7"]',
                'portrait' => 'company-field-1693365446.jpg',
                'active' => TRUE,
                'location_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'size' => '20x30',
                'type' => 'Cemento',
                'players' => '22',
                'games' => '["5v5","8v8","11v11"]',
                'portrait' => 'company-field-1693453163.jpg',
                'active' => TRUE,
                'location_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'size' => '90m x 120m',
                'type' => 'Grass',
                'players' => '22',
                'games' => '["6v6","7v7","8v8","9v9","11v11"]',
                'portrait' => 'company-field-1693453493.jpg',
                'active' => TRUE,
                'location_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'size' => '90m x 120m',
                'type' => 'Grass',
                'players' => '16',
                'games' => '["6v6","7v7","8v8"]',
                'portrait' => 'company-field-1693453715.jpg',
                'active' => TRUE,
                'location_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'size' => '90m x 120m',
                'type' => 'Grass',
                'players' => '14',
                'games' => '["6v6","7v7"]',
                'portrait' => 'company-field-1693453723.jpg',
                'active' => TRUE,
                'location_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'size' => '90m x 120m',
                'type' => 'Grass',
                'players' => '14',
                'games' => '["6v6","7v7"]',
                'portrait' => 'company-field-1693453940.jpg',
                'active' => TRUE,
                'location_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'size' => '90m x 120m',
                'type' => 'Grass',
                'players' => '16',
                'games' => '["7v7","8v8"]',
                'portrait' => 'company-field-1693469006.jpg',
                'active' => TRUE,
                'location_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'size' => '90m x 120m',
                'type' => 'Grass',
                'players' => '16',
                'games' => '["6v6","8v8"]',
                'portrait' => 'company-field-1693469870.jpg',
                'active' => TRUE,
                'location_id' => 7,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'size' => '90m x 120m',
                'type' => 'Grass',
                'players' => '14',
                'games' => '["6v6","7v7"]',
                'portrait' => 'company-field-1693469889.jpg',
                'active' => TRUE,
                'location_id' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'size' => '90m x 120m',
                'type' => 'Grass',
                'players' => '14',
                'games' => '["6v6","7v7"]',
                'portrait' => 'company-field-1695016831.jpg',
                'active' => TRUE,
                'location_id' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'size' => '90m x 120m',
                'type' => 'Grass',
                'players' => '14',
                'games' => '["6v6","7v7"]',
                'portrait' => 'company-field-1695016839.jpg',
                'active' => TRUE,
                'location_id' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'size' => '90m x 120m',
                'type' => 'Grass',
                'players' => '14',
                'games' => '["6v6","7v7"]',
                'portrait' => 'company-field-1705726605.jpg',
                'active' => TRUE,
                'location_id' => 11,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'size' => '90m x 120m',
                'type' => 'Grass',
                'players' => '14',
                'games' => '["6v6","7v7"]',
                'portrait' => 'company-field-1705726707.jpg',
                'active' => TRUE,
                'location_id' => 12,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'size' => '90m x 120m',
                'type' => 'Grass',
                'players' => '14',
                'games' => '["6v6","7v7"]',
                'portrait' => 'company-field-1705726715.jpg',
                'active' => TRUE,
                'location_id' => 13,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'size' => '90m x 120m',
                'type' => 'Grass',
                'players' => '16',
                'games' => '["6v6","7v7","8v8"]',
                'portrait' => 'company-field-1705759497.jpg',
                'active' => TRUE,
                'location_id' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'size' => '90m x 120m',
                'type' => 'Sintético',
                'players' => '22',
                'games' => '["6v6","7v7","8v8","9v9","11v11"]',
                'portrait' => 'company-field-1705759507.jpg',
                'active' => TRUE,
                'location_id' => 14,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'size' => '90m x 120m',
                'type' => 'Grass',
                'players' => '16',
                'games' => '["6v6","7v7","8v8"]',
                'portrait' => 'company-field-1705759515.jpg',
                'active' => TRUE,
                'location_id' => 15,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'size' => '90m x 120m',
                'type' => 'Grass',
                'players' => '16',
                'games' => '["6v6","7v7","8v8"]',
                'portrait' => 'company-field-1706927978.jpg',
                'active' => TRUE,
                'location_id' => 16,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'size' => '90m x 120m',
                'type' => 'Grass',
                'players' => '22',
                'games' => '["6v6","7v7","8v8","9v9","11v11"]',
                'portrait' => 'company-field-1706927985.jpg',
                'active' => TRUE,
                'location_id' => 17,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'size' => '90m x 120m',
                'type' => 'Grass',
                'players' => '14',
                'games' => '["6v6","7v7"]',
                'portrait' => 'company-field-1706927992.jpg',
                'active' => TRUE,
                'location_id' => 18,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'size' => '90m x 120m',
                'type' => 'Grass',
                'players' => '14',
                'games' => '["6v6","7v7"]',
                'portrait' => 'company-field-1706980595.jpg',
                'active' => TRUE,
                'location_id' => 19,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'size' => '90m x 120m',
                'type' => 'Grass',
                'players' => '22',
                'games' => '["6v6","7v7","8v8","11v11"]',
                'portrait' => 'company-field-1706980600.jpg',
                'active' => TRUE,
                'location_id' => 20,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'size' => '90m x 120m',
                'type' => 'Grass',
                'players' => '18',
                'games' => '["6v6","7v7","8v8","9v9"]',
                'portrait' => 'company-field-1706980607.jpg',
                'active' => TRUE,
                'location_id' => 21,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'size' => '90m x 120m',
                'type' => 'Grass',
                'players' => '18',
                'games' => '["6v6","7v7","8v8","9v9"]',
                'portrait' => 'company-field-1716705861.jpg',
                'active' => TRUE,
                'location_id' => 22,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'size' => '90m x 120m',
                'type' => 'Grass',
                'players' => '18',
                'games' => '["6v6","7v7","8v8","9v9"]',
                'portrait' => 'company-field-1716705874.jpg',
                'active' => TRUE,
                'location_id' => 23,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'size' => '90m x 120m',
                'type' => 'Grass',
                'players' => '18',
                'games' => '["6v6","7v7","8v8","9v9"]',
                'portrait' => NULL,
                'active' => TRUE,
                'location_id' => 24,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'size' => '90m x 120m',
                'type' => 'Grass',
                'players' => '18',
                'games' => '["6v6","7v7","8v8","9v9"]',
                'portrait' => NULL,
                'active' => TRUE,
                'location_id' => 25,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'size' => '90m x 120m',
                'type' => 'Grass',
                'players' => '22',
                'games' => '["6v6","7v7","8v8","11v11"]',
                'portrait' => NULL,
                'active' => TRUE,
                'location_id' => 26,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'size' => '90m x 120m',
                'type' => 'Grass',
                'players' => '22',
                'games' => '["6v6","7v7","8v8","11v11"]',
                'portrait' => NULL,
                'active' => TRUE,
                'location_id' => 27,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'size' => '90m x 120m',
                'type' => 'Grass',
                'players' => '16',
                'games' => '["6v6","7v7","8v8"]',
                'portrait' => NULL,
                'active' => TRUE,
                'location_id' => 28,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'size' => '90m x 120m',
                'type' => 'Grass',
                'players' => '22',
                'games' => '["6v6","7v7","8v8","11v11"]',
                'portrait' => NULL,
                'active' => TRUE,
                'location_id' => 28,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
