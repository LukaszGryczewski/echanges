<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Empty the table first
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Role::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $roles = [
            [
                'role' => 'admin',
                'name' => 'Administrateur',
            ],
            [
                'role' => 'user',
                'name' => 'Utilisateur',
            ],
        ];

        DB::table('roles')->insert($roles);
    }
}
