<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    //

    public function show_post(){
        // $posts = Post::all();
         $posts = Post::paginate(3);

        return view('home',['posts' => $posts]);
    }
    public function index()
{
    $posts = Post::with('comments')->paginate(5);

    return view('home', compact('posts'));
}
}
