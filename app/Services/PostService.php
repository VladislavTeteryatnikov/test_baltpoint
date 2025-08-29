<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class PostService
{
    /**
     * Все посты
     *
     * @return Collection
     */
    public function getAllPosts(): Collection
    {
        return Post::orderByDesc('id')->get();
    }

    /**
     * Пост с комментариями
     *
     * @param int $id Id поста
     * @return Post|null
     */
    public function getPostWithCommentsById(int $id): ?Post
    {
        return Post::with('comments')->find($id);
    }

    /**
     * Создать новый пост
     *
     * @param array $data
     * @return Post
     */
    public function createPost(array $data): Post
    {
        return Post::create($data);
    }

}
