<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Quota;
use App\Services\PostService;
use App\Http\Requests\PostsRequest;
use Illuminate\Http\RedirectResponse;
use App\Events\NotifyQuotasReachedEvent;
use App\Events\NotifyAdminQuotasReachedEvent;

class PostController extends Controller
{
    private PostService $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
        $this->authorizeResource(Post::class, 'post');
    }

    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = $this->postService->all();
        return view('post.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $post = new Post;
        return view('post.create', ['post' => $post]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostsRequest $request): RedirectResponse
    {
        !is_null(auth()->user()->quota) && abort_if(auth()->user()->quota->limitQuotas(),401, 'Quotas dépassé');
        $validate = $request->validated();
        $this->postService->create($validate);

        event(new NotifyQuotasReachedEvent(auth()->user()));

        return redirect()->route('posts.index')->with('message', 'Votre article a été ajouté.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('post.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostsRequest $request, Post $post): RedirectResponse
    {
        $validate = $request->validated();
        $this->postService->update($post, $validate);

         return redirect()->route('posts.index')->with('message', 'Votre article a été modifié.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function confirmDelete(Post $post)
    {
        return view('post.confirm-delete', ['post' => $post]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): RedirectResponse
    {
        $this->postService->delete($post);

         return redirect()->route('posts.index')->with('message', 'Votre article a été supprimé.');
    }
}
