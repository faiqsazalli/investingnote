<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentsRequest;
use App\Models\Post;
use App\Models\Comments;
use Illuminate\Http\RedirectResponse;

class CommentsController extends Controller
{
    public function store(Post $post, CommentsRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $comment = new Comments();

        $comment->post_id = $post->id;
        $comment->author = $data['author'];
        $comment->text = $data['text'];
        $comment->save();

        return back();

    }
}
