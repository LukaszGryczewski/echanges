<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Faker\Factory as Faker;

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

        // Utiliser la bibliothèque Faker pour générer des données aléatoires
        $faker = Faker::create();
        $typeId = $faker->numberBetween(1, 4);
        $products = [
            [
                'name' => 'Goku',
                'description' => 'Les Pop! Vinyl de Funko sont des figurines de collection produites sous licence officielle qui représentent une énorme gamme de franchises et séries issues de la culture populaire.',
                'quantity' => $faker->numberBetween(1, 10),
                'edition' => 'funko pop',
                'type_id' => $typeId,
                'condition' => $faker->randomElement(['Neuf', 'Parfait', 'Très bon', 'Bon', 'Moyen', 'Mauvais', 'Très Mauvais']),
                'image' => '',
                'type_transaction' => $faker->randomElement(['Vente', 'Echange', 'Enchere']),
                'isAvailable' => true,
                'created_at' => now(),
            ],

        ];
        DB::table('products')->insert($products);
    }
}
