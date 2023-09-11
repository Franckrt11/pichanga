<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Config;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Config::insert([
            [
                'type' => 'mail',
                'value' => 'soporte@tejuegounapichanga.com',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'type' => 'phone',
                'value' => '999888777',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'type' => 'terms',
                'value' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere nemo vitae nihil laboriosam, corporis laudantium commodi? Facilis delectus voluptatum labore officiis eaque iusto quibusdam porro incidunt laudantium laboriosam, praesentium omnis?</p>',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'type' => 'privacy',
                'value' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere nemo vitae nihil laboriosam, corporis laudantium commodi? Facilis delectus voluptatum labore officiis eaque iusto quibusdam porro incidunt laudantium laboriosam, praesentium omnis?</p>',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
