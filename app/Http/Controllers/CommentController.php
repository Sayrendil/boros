<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->body = $request->get('comment_body');
        // $comment->users()->associate($request->user());
        $comment->user_id = $request->session()->get('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d');
        $comment->parent_id = $request->get('parent_id');
        $post = Post::find($request->get('post_id'));
        // $comment->user_id = $request->get('user_id');
        // dd($post);
        $post->comments()->save($comment);

        return back();
    }

    public function replystore(Request $request)
    {
        $reply = new Comment;
        $reply->body = $request->get('comment_body');
        $reply->user_id = $request->session()->get('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d');
        $reply->parent_id = $request->get('comment_id');
        $post = Post::find($request->get('post_id'));
        // dd($post);

        $post->comments()->save($reply);

        return back();

    }
    
}
