<?php

namespace App\Services;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class PostService
{
    private string $keyCachePost;

    public function __construct() {
        $this->keyCachePost = 'posts-' . auth()->id(); 
    }
    /**
     * Display a listing of the resource.
     */
    public function all()
    {
        return Cache::remember($this->keyCachePost, now()->addMinutes(60), function () {
            return Post::belongsToUser(auth()->id())->get();
        });
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(array $data): Post
    {       
        $post = Post::create($data + ["user_id" => auth()->id()]);

        Cache::forget($this->keyCachePost);

        return $post;
    }

    public function update(Post $post, array $data): Post
    {
        $post->update($data);

        Cache::forget($this->keyCachePost);

        return $post->fresh();
    }

    public function delete(Post $post): bool
    {
        $delete = $post->delete();

        Cache::forget($this->keyCachePost);
        
        return $delete;
    }

}
