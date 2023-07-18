<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommentSeeder extends Seeder
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

        $comments = [
            [
                //'user_id' => 1,
                'product_id' => 1,
                'comment' => 'Tres bon produit',
                'created_at' => now(),
            ]

        ];

        DB::table('comments')->insert($comments);
    }
}
