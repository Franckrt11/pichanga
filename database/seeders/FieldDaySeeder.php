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
        $nextFields = [];

        for ($i = 2; $i < 32; $i++) {
            $nextFields[] = [
                'day' => 0,
                'active' => FALSE,
                'field_id' => $i,
                'created_at' => now(),
                'updated_at' => now()
            ];
            $nextFields[] = [
                'day' => 1,
                'active' => TRUE,
                'field_id' => $i,
                'created_at' => now(),
                'updated_at' => now()
            ];
            $nextFields[] = [
                'day' => 2,
                'active' => TRUE,
                'field_id' => $i,
                'created_at' => now(),
                'updated_at' => now()
            ];
            $nextFields[] = [
                'day' => 3,
                'active' => TRUE,
                'field_id' => $i,
                'created_at' => now(),
                'updated_at' => now()
            ];
            $nextFields[] = [
                'day' => 4,
                'active' => TRUE,
                'field_id' => $i,
                'created_at' => now(),
                'updated_at' => now()
            ];
            $nextFields[] = [
                'day' => 5,
                'active' => TRUE,
                'field_id' => $i,
                'created_at' => now(),
                'updated_at' => now()
            ];
            $nextFields[] = [
                'day' => 6,
                'active' => FALSE,
                'field_id' => $i,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        FieldDay::insert([
            [
                'day' => 0,
                'active' => FALSE,
                'field_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'day' => 1,
                'active' => TRUE,
                'field_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'day' => 2,
                'active' => TRUE,
                'field_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'day' => 3,
                'active' => TRUE,
                'field_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'day' => 4,
                'active' => TRUE,
                'field_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'day' => 5,
                'active' => FALSE,
                'field_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'day' => 6,
                'active' => FALSE,
                'field_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        FieldDay::insert($nextFields);
    }
}
