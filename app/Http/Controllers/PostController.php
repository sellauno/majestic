<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function __construct()
    {
         return $this->middleware('auth');
    }

    public function create()
    {
        return view('post');
    }

    public function store(Request $request)
    {
        $post =  new Post;
        $post->body = $request->get('body');

        $post->save();
        // dd($post);
        return redirect('/post/show/'.$post->id);
    }
    public function index()
{
    $posts = Post::all();
    dd($post);
    return view('index', compact('posts'));
}
public function show($id)
{
    $post = Post::find($id);

    return view('show', compact('post'));
}
}
