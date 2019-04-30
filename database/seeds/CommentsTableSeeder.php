<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->truncate();

        DB::table('comments')->insert([
            'id_user' => 16,
            'id_product' => 8,
            'content' => 'ngon lắm',
            'rating' => 4
        ]);
        DB::table('comments')->insert([
            'id_user' => 16,
            'id_product' => 8,
            'content' => 'ngon lắm',
            'rating' => 4
        ]);
        DB::table('comments')->insert([
            'id_user' => 16,
            'id_product' => 8,
            'content' => 'ngon lắm',
            'rating' => 4
        ]);
        DB::table('comments')->insert([
            'id_user' => 16,
            'id_product' => 8,
            'content' => 'ngon lắm',
            'rating' => 4
        ]);
        DB::table('comments')->insert([
            'id_user' => 16,
            'id_product' => 8,
            'content' => 'ngon lắm',
            'rating' => 4
        ]);
        DB::table('comments')->insert([
            'id_user' => 16,
            'id_product' => 8,
            'content' => 'ngon lắm',
            'rating' => 4
        ]);
        DB::table('comments')->insert([
            'id_user' => 16,
            'id_product' => 8,
            'content' => 'ngon lắm',
            'rating' => 4
        ]);
        DB::table('comments')->insert([
            'id_user' => 16,
            'id_product' => 8,
            'content' => 'ngon lắm',
            'rating' => 4
        ]);
        DB::table('comments')->insert([
            'id_user' => 16,
            'id_product' => 8,
            'content' => 'ngon lắm',
            'rating' => 4
        ]);
        DB::table('comments')->insert([
            'id_user' => 16,
            'id_product' => 8,
            'content' => 'ngon lắm',
            'rating' => 4
        ]);

    }
}
