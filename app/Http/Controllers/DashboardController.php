<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class DashboardController extends Controller
{
    public function show_post(){
        $posts = Post::all();
        return view('dashboard',['posts' => $posts]);


    }
}
