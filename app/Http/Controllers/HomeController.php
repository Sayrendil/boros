<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $posts = Post::get();

        // die(var_dump($posts));

        return view('index', compact('posts'));
    }

    public function post($slug) 
    {

        $post = Post::where('slug', '=', $slug)->firstOrFail();
        $comments = Comment::with('users')->where('commentable_id', $post->id)->get();

        return view('post', compact('post', 'comments'));

    }

}
