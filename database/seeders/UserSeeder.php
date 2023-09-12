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

        // Bibliothèque Faker pour générer des données aléatoires
        $faker = Faker::create();

        // 6 utilisateurs manuels
        $manualUsers = [
            [
                'login' => 'Tom',
                'firstname' => 'Tom',
                'lastname' => 'Didier',
                'gender' => 'Monsieur',
                'role_id' => 1,
                'address_id' => $faker->numberBetween(1, 170),
                'email' => 'tom@gmail.com',
                'password' => Hash::make('rootroot'),
                'phone' => '0412345678',
                'profile_image' => 'images/default.jpg',
                'created_at' => now(),
                'isBlocked' => false,
            ],
            [
                'login' => 'Marc',
                'firstname' => 'Marc',
                'lastname' => 'Mettio',
                'gender' => 'Monsieur',
                'role_id' => 2,
                'address_id' => $faker->numberBetween(1, 170),
                'email' => 'marc@gmail.com',
                'password' => Hash::make('rootroot'),
                'phone' => '0475189642',
                'profile_image' => 'images/default.jpg',
                'created_at' => now(),
                'isBlocked' => false,
            ],
            [
                'login' => 'Philip',
                'firstname' => 'Philip',
                'lastname' => 'Pilihp',
                'gender' => 'Monsieur',
                'role_id' => 2,
                'address_id' => $faker->numberBetween(1, 170),
                'email' => 'philip@gmail.com',
                'password' => Hash::make('rootroot'),
                'phone' => '0436184275',
                'profile_image' => 'images/default.jpg',
                'created_at' => now(),
                'isBlocked' => false,
            ],
            [
                'login' => 'Eric',
                'firstname' => 'Eric',
                'lastname' => 'Krik',
                'gender' => 'Monsieur',
                'role_id' => 2,
                'address_id' => $faker->numberBetween(1, 170),
                'email' => 'eric@gmail.com',
                'password' => Hash::make('rootroot'),
                'phone' => '0464891587',
                'profile_image' => 'images/default.jpg',
                'created_at' => now(),
                'isBlocked' => false,
            ],
            [
                'login' => 'Mathieu',
                'firstname' => 'Mathieu',
                'lastname' => 'Laubo',
                'gender' => 'Monsieur',
                'role_id' => 2,
                'address_id' => $faker->numberBetween(1, 170),
                'email' => 'mathieu@gmail.com',
                'password' => Hash::make('rootroot'),
                'phone' => '0441574157',
                'profile_image' => 'images/default.jpg',
                'created_at' => now(),
                'isBlocked' => false,
            ],
            [
                'login' => 'Enrico',
                'firstname' => 'Enrico',
                'lastname' => 'Paco',
                'gender' => 'Monsieur',
                'role_id' => 2,
                'address_id' => $faker->numberBetween(1, 170),
                'email' => 'enrico@gmail.com',
                'password' => Hash::make('rootroot'),
                'phone' => '0465412348',
                'profile_image' => 'images/default.jpg',
                'created_at' => now(),
                'isBlocked' => false,
            ],
        ];

        $users = [];

        $usedLogins = array_column($manualUsers, 'login');
        $usedEmails = array_column($manualUsers, 'email');
        $usedPhones = array_column($manualUsers, 'phone');

        $users = array_merge($users, $manualUsers);

        for ($i = 0; $i < 100; $i++) {
            // Login est unique
            do {
                $login = $faker->userName;
            } while (in_array($login, $usedLogins));
            $usedLogins[] = $login;

            // Courriel est unique
            do {
                $email = $faker->unique()->safeEmail;
            } while (in_array($email, $usedEmails));
            $usedEmails[] = $email;

            // Téléphone est unique
            do {
                $phone = $faker->phoneNumber;
            } while (in_array($phone, $usedPhones));
            $usedPhones[] = $phone;

            $users[] = [
                'login' => $login,
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'gender' => $faker->randomElement(['Madame', 'Monsieur']),
                'role_id' => 2,
                'address_id' => $faker->numberBetween(1, 170),
                'email' => $email,
                'password' => Hash::make('rootroot'),
                'phone' => $phone,
                'profile_image' => 'images/default.jpg',
                'created_at' => now(),
                'isBlocked' => false,
            ];
        }

        DB::table('users')->insert($users);
    }
}
