<?php

namespace App\Observers;

use App\Models\Post;
use App\Models\Quota;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    public function created(Post $post): void
    {
        $quota = Quota::where('user_id', $post->user_id)->first();
        if (is_null($quota)) {
            Quota::create([
                'user_id' => $post->user_id,
                'value' => 1
            ]);
        } else {
            $quota->increment('value');
        }


    }

    /**
     * Handle the Post "updated" event.
     */
    public function updated(Post $post): void
    {
        // 
    }

    /**
     * Handle the Post "deleted" event.
     */
    public function deleted(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "restored" event.
     */
    public function restored(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     */
    public function forceDeleted(Post $post): void
    {
        //
    }
}
