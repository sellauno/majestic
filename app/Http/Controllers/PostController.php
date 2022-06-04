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
        $post->name = $request->post('name');
        $post->save();
        // dd($post);
        return redirect()->back();
    }
    public function index()
{
    $posts = Comment::all();
    dd($post);
    return view('index', compact('posts'));
}
public function show($id)
{
    $post = Comment::find($id);

    return view('show', compact('post'));
}
}
