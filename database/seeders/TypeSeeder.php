<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Empty the table first
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Product::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $types = [
            [
                'type' => 'figurine',
            ],
            [
                'type' => 'jeu video',
            ],
            [
                'type' => 'carte',
            ],
            [
                'type' => 'manga',
            ],

        ];
        DB::table('types')->insert($types);
    }
}
