<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::factory()
            ->count(10)
            ->create();

        foreach ($posts as $post) {
            Comment::factory()
                ->count(rand(1, 3))
                ->create([
                    'post_id' => $post->id
                ]);
        }
    }
}
