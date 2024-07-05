<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            UserSeeder::class,
            CompanySeeder::class,
            CountrySeeder::class,
            CitySeeder::class,
            DistrictSeeder::class,
            FieldSeeder::class,
            FieldDaySeeder::class,
            FieldHourSeeder::class,
            FieldPriceSeeder::class,
            CommentSeeder::class,
            ConfigSeeder::class,
            CompanyActivityLogSeeder::class,
            UserActivityLogSeeder::class,
            ChatSeeder::class
        ]);
    }
}
