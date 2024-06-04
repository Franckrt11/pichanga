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
                'photo' => 'company-avatar-1697648612.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Complejo La Caleta',
                'ruc' => '20123456701',
                'email' => 'lacaleta@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status' => TRUE,
                'photo' => NULL,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Sport Point',
                'ruc' => '20123456702',
                'email' => 'sportpoint@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status' => TRUE,
                'photo' => NULL,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Club Maracana',
                'ruc' => '20123456703',
                'email' => 'clubmaracana@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status' => TRUE,
                'photo' => NULL,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Campo Rimac',
                'ruc' => '20123456704',
                'email' => 'camporimac@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status' => TRUE,
                'photo' => NULL,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Complejo Deportivo San Pio X',
                'ruc' => '20123456705',
                'email' => 'sanpio@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status' => TRUE,
                'photo' => NULL,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Campo Cultural Lima',
                'ruc' => '20123456706',
                'email' => 'campoculturallima@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status' => TRUE,
                'photo' => NULL,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Country Club Chama',
                'ruc' => '20123456707',
                'email' => 'clubchama@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status' => TRUE,
                'photo' => NULL,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Sport Plaza',
                'ruc' => '20123456708',
                'email' => 'sportplaza@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status' => TRUE,
                'photo' => NULL,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'La Cantera',
                'ruc' => '20123456709',
                'email' => 'lacantera@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status' => TRUE,
                'photo' => NULL,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'La Bombonera',
                'ruc' => '20123456710',
                'email' => 'labombonera@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status' => TRUE,
                'photo' => NULL,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Entrepelotas Club',
                'ruc' => '20123456711',
                'email' => 'entrepelotasclub@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status' => TRUE,
                'photo' => NULL,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Macho Center',
                'ruc' => '20123456712',
                'email' => 'machocenter@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status' => TRUE,
                'photo' => NULL,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Centro Deportivo San Francisco',
                'ruc' => '20123456713',
                'email' => 'sanfrancisco@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status' => TRUE,
                'photo' => NULL,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'La Pelotera',
                'ruc' => '20123456714',
                'email' => 'lapelotera@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status' => TRUE,
                'photo' => NULL,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Marceti Club',
                'ruc' => '20123456715',
                'email' => 'marceticlub@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status' => TRUE,
                'photo' => NULL,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Asociación de Residentes Pando I Etapa',
                'ruc' => '20123456716',
                'email' => 'pando@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status' => TRUE,
                'photo' => NULL,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Soccer Club del Perú - Jockey',
                'ruc' => '20123456717',
                'email' => 'soccerclubperú@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status' => TRUE,
                'photo' => NULL,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Picapiedra Soccer',
                'ruc' => '20123456718',
                'email' => 'picapiedrasoccer@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status' => TRUE,
                'photo' => NULL,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Complejo Eliseo Naval',
                'ruc' => '20123456719',
                'email' => 'complejoeliseonaval@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status' => TRUE,
                'photo' => NULL,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Complejo Deportivo la 9',
                'ruc' => '20123456720',
                'email' => 'complejodeportivo9@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status' => TRUE,
                'photo' => NULL,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'VillaSport Los Precursores',
                'ruc' => '20123456721',
                'email' => 'villasportprecursores@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status' => TRUE,
                'photo' => NULL,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Villa Sport Club',
                'ruc' => '20123456722',
                'email' => 'villasportclub@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status' => TRUE,
                'photo' => NULL,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'La Cancha Perú',
                'ruc' => '20123456723',
                'email' => 'lacanchaperú@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status' => TRUE,
                'photo' => NULL,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Futbol Plaza',
                'ruc' => '20123456724',
                'email' => 'futbolplaza@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status' => TRUE,
                'photo' => NULL,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Centenario FC',
                'ruc' => '20123456725',
                'email' => 'centenariofc@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status' => TRUE,
                'photo' => NULL,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Deport Center - Paz Soldan',
                'ruc' => '20123456726',
                'email' => 'deportcenter@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status' => TRUE,
                'photo' => NULL,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'La numero 10',
                'ruc' => '20123456727',
                'email' => 'numero10@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status' => TRUE,
                'photo' => NULL,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Campo Deportivo Jali Sports',
                'ruc' => '20123456728',
                'email' => 'jalisports@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status' => TRUE,
                'photo' => NULL,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
