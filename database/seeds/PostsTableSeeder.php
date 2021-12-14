<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => 'Jane\'s first post.',
            'content' => 'Welcome to Jane\'s first post!',
            'image_url' => 'https://picsum.photos/320/240?random=1',
            'created_by' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('posts')->insert([
            'title' => 'Bobs\'s first post.',
            'content' => 'Welcome to Bob\'s first post!',
            'image_url' => 'https://picsum.photos/320/240?random=2',
            'created_by' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('posts')->insert([
            'title' => 'Susan\'s first post.',
            'content' => 'Welcome to Susan\'s first post!',
            'image_url' => 'https://picsum.photos/320/240?random=3',
            'created_by' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
