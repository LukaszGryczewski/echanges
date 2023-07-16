<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
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

        $products = [
            [
                'name' => 'Goku',
                'description' => 'Les Pop! Vinyl de Funko sont des figurines de collection produites sous licence officielle qui représentent une énorme gamme de franchises et séries issues de la culture populaire.',
                'quantity' => 1,
                'edition' => 'funko pop',
                'type_id' => 1,
                'condition' => 'Trés bon',
                'image' => '',
                'isAvailable' => true,
                'created_at' => now(),
            ],

        ];
        DB::table('products')->insert($products);
    }
}
