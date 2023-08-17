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

        // Vos 6 utilisateurs manuels
        $manualUsers = [
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

        $users = []; // Ceci stockera tous vos utilisateurs, y compris les 6 manuels et les 100 Faker

        // Pour éviter les duplications, ajoutez d'abord vos utilisateurs manuels
        $usedLogins = array_column($manualUsers, 'login');
        $usedEmails = array_column($manualUsers, 'email');
        $usedPhones = array_column($manualUsers, 'phone');

        // Ajouter les utilisateurs manuels à la liste principale
        $users = array_merge($users, $manualUsers);

        for ($i = 0; $i < 100; $i++) {
            // Assurez-vous que le login est unique
            do {
                $login = $faker->userName;
            } while (in_array($login, $usedLogins));
            $usedLogins[] = $login;

            // Assurez-vous que le courriel est unique
            do {
                $email = $faker->unique()->safeEmail;
            } while (in_array($email, $usedEmails));
            $usedEmails[] = $email;

            // Assurez-vous que le téléphone est unique
            do {
                $phone = $faker->phoneNumber;
            } while (in_array($phone, $usedPhones));
            $usedPhones[] = $phone;

            $users[] = [
                'login' => $login,
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'role_id' => 2,
                'address_id' => $faker->numberBetween(1, 170),
                'email' => $email,
                'password' => Hash::make('rootroot'),
                'phone' => $phone,
                'created_at' => now(),
            ];
        }

        DB::table('users')->insert($users);
    }
}
