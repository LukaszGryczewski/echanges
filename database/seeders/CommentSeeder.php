<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Support\Carbon;
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
        Comment::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $comments = [
            [
                'user_id' => 1,
                'product_id' => 1,
                'comment' => 'Tres bon produit',
                'score' => 2,
                'created_at' => now(),
            ],
            [
                'user_id' => 1,
                'product_id' => 1,
                'comment' => 'Parfait',
                'score' => 4,
                'created_at' => now(),
            ],
            [
                'user_id' => 1,
                'product_id' => 1,
                'comment' => 'La livraison à eu du retard',
                'score' => 5,
                'created_at' => now(),
            ],
            [
                'user_id' => 1,
                'product_id' => 1,
                'comment' => 'j\'adore',
                'score' => 3,
                'created_at' => now(),
            ],
        ];

        // Comment templates
        $commentTemplates = [
            1 => ['Très déçu', 'Je ne recommanderais pas', 'Horrible'],
            2 => ['Pas terrible', 'Pourrait être mieux', 'Décevant'],
            3 => ['Moyen', 'Pas mal', 'Pourrait être amélioré'],
            4 => ['Très bon produit', 'J\'adore', 'Recommandé'],
            5 => ['Excellent', 'Parfait', 'Incroyable']
        ];

        // Generate random comments
        for ($i = 0; $i < 100; $i++) {
            $userId = rand(1, 106);
            $productId = rand(1, 48);
            $score = rand(1, 5);
            $comment = $commentTemplates[$score][array_rand($commentTemplates[$score])];
            $createdAt = Carbon::now()->subDays(rand(0, 30))->toDateTimeString();

            DB::table('comments')->insert([
                'user_id' => $userId,
                'product_id' => $productId,
                'comment' => $comment,
                'score' => $score,
                'created_at' => $createdAt,
                'updated_at' => $createdAt,
            ]);
        }

        //DB::table('comments')->insert($comments);
    }
}
