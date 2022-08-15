<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use App\Http\Requests\PostsRequest;
use App\Models\Comment;

class PostsController extends Controller
{
    public function index()
    {

        return view('posts.index', [
            'posts' => Post::latest()->get(),
            'posts' => Post::orderBy('id', 'desc')->paginate(3)
            
        ]);

         
    }

    public function show(Post $post): View
    {
        return view('posts.show', [
            'post' => $post,
            'comments' => $post->comments()->get()
        ]);
    }

    public function create(): View
    {
        return view('posts.create');
    }

    public function store(PostsRequest $request)
    {
        $data = $request->validated();

        $post = new Post();
        $post->title = $data['title'];
        $post->body = $data['body'];
        $post->tag = $data['tags'];
        $post->save();

        return redirect('/posts/' .$post->id);
    }
}
