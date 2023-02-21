<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    /**
     * Display a listing of the resource.
     */
    public function all()
    {
        return Post::paginate(5);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(array $data): Post
    {       
        return Post::create($data);
    }

    public function update(Post $post, array $data): Post
    {
        $post->update($data);

        return $post->fresh();
    }

    public function delete(Post $post): bool
    {
        return $post->delete();
    }

}
