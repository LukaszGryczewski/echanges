<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
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
                'address_id' => $faker->numberBetween(1, 170),
                'email' => 'tom@gmail.com',
                'password' => 'rootroot',
                'phone' => '0412345678',
                'created_at' => now(),
            ],
            [
                'login' => 'Marc',
                'firstname' => 'Marc',
                'lastname' => 'Mettio',
                'address_id' => $faker->numberBetween(1, 170),
                'email' => 'marc@gmail.com',
                'password' => 'rootroot',
                'phone' => '0475189642',
                'created_at' => now(),
            ],
            [
                'login' => 'Philip',
                'firstname' => 'Philip',
                'lastname' => 'Pilihp',
                'address_id' => $faker->numberBetween(1, 170),
                'email' => 'philip@gmail.com',
                'password' => 'rootroot',
                'phone' => '0436184275',
                'created_at' => now(),
            ],
            [
                'login' => 'Eric',
                'firstname' => 'Eric',
                'lastname' => 'Krik',
                'address_id' => $faker->numberBetween(1, 170),
                'email' => 'eric@gmail.com',
                'password' => 'rootroot',
                'phone' => '0464891587',
                'created_at' => now(),
            ],
            [
                'login' => 'Mathieu',
                'firstname' => 'Mathieu',
                'lastname' => 'Laubo',
                'address_id' => $faker->numberBetween(1, 170),
                'email' => 'mathieu@gmail.com',
                'password' => 'rootroot',
                'phone' => '0441574157',
                'created_at' => now(),
            ],
            [
                'login' => 'Enrico',
                'firstname' => 'Enrico',
                'lastname' => 'Paco',
                'address_id' => $faker->numberBetween(1, 170),
                'email' => 'enrico@gmail.com',
                'password' => 'rootroot',
                'phone' => '0465412348',
                'created_at' => now(),
            ],

        ];
        DB::table('users')->insert($users);
    }
}