<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FieldDay;

class FieldDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FieldDay::insert([
            [
                'day' => 'lu',
                'active' => TRUE,
                'field_id' => 1,
                'created_at' => now(),
                'updated_at' => now()

            ],
            [
                'day' => 'ma',
                'active' => TRUE,
                'field_id' => 1,
                'created_at' => now(),
                'updated_at' => now()

            ],
            [
                'day' => 'mi',
                'active' => TRUE,
                'field_id' => 1,
                'created_at' => now(),
                'updated_at' => now()

            ],
            [
                'day' => 'ju',
                'active' => TRUE,
                'field_id' => 1,
                'created_at' => now(),
                'updated_at' => now()

            ],
            [
                'day' => 'vi',
                'active' => FALSE,
                'field_id' => 1,
                'created_at' => now(),
                'updated_at' => now()

            ],
            [
                'day' => 'sa',
                'active' => FALSE,
                'field_id' => 1,
                'created_at' => now(),
                'updated_at' => now()

            ],
            [
                'day' => 'do',
                'active' => FALSE,
                'field_id' => 1,
                'created_at' => now(),
                'updated_at' => now()

            ]
        ]);
    }
}
