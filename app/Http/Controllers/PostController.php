<?php

namespace App\Http\Controllers;

use App\Comment;
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
        $post =  new Comment;
        $post->body = $request->post('body');
        $post->idUser = $request->post('iduser');

        $post->komentator = $request->post('komentator');
        $post->save();
        // dd($post);
        return redirect()->back();
    }
    public function index()
    {
        $posts = Comment::all();
        // dd($posts);
        return view('index', compact('posts'));
    }
    public function show($id)
    {
        $post = Comment::find($id);

        return view('show', compact('post'));
    }

    public function delete($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->back();
    }
}
