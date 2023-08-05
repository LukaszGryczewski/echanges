<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Empty the table first
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // Utiliser la bibliothèque Faker pour générer des données aléatoires
        $faker = Faker::create();
        $users = [
            [
                'login' => 'Tom',
                'firstname' => 'Tom',
                'lastname' => 'Didier',
                'role_id' => 1,
                'address_id' => $faker->numberBetween(1, 170),
                'email' => 'tom@gmail.com',
                'password' => Hash::make('rootroot'),
                'phone' => '0412345678',
                'created_at' => now(),
            ],
            [
                'login' => 'Marc',
                'firstname' => 'Marc',
                'lastname' => 'Mettio',
                'role_id' => 2,
                'address_id' => $faker->numberBetween(1, 170),
                'email' => 'marc@gmail.com',
                'password' => Hash::make('rootroot'),
                'phone' => '0475189642',
                'created_at' => now(),
            ],
            [
                'login' => 'Philip',
                'firstname' => 'Philip',
                'lastname' => 'Pilihp',
                'role_id' => 2,
                'address_id' => $faker->numberBetween(1, 170),
                'email' => 'philip@gmail.com',
                'password' => Hash::make('rootroot'),
                'phone' => '0436184275',
                'created_at' => now(),
            ],
            [
                'login' => 'Eric',
                'firstname' => 'Eric',
                'lastname' => 'Krik',
                'role_id' => 2,
                'address_id' => $faker->numberBetween(1, 170),
                'email' => 'eric@gmail.com',
                'password' => Hash::make('rootroot'),
                'phone' => '0464891587',
                'created_at' => now(),
            ],
            [
                'login' => 'Mathieu',
                'firstname' => 'Mathieu',
                'lastname' => 'Laubo',
                'role_id' => 2,
                'address_id' => $faker->numberBetween(1, 170),
                'email' => 'mathieu@gmail.com',
                'password' => Hash::make('rootroot'),
                'phone' => '0441574157',
                'created_at' => now(),
            ],
            [
                'login' => 'Enrico',
                'firstname' => 'Enrico',
                'lastname' => 'Paco',
                'role_id' => 2,
                'address_id' => $faker->numberBetween(1, 170),
                'email' => 'enrico@gmail.com',
                'password' => Hash::make('rootroot'),
                'phone' => '0465412348',
                'created_at' => now(),
            ],

        ];
        DB::table('users')->insert($users);
    }
}
