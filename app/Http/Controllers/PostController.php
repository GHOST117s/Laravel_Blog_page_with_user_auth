<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        return view('post');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // //
        // $user = $request->user();
        // $post = new Post;
        // $post->title = $request->title;
        // $post->body = $request->body;
        // $user->post()->save($post);        
        // return redirect(route('post_index'))->with('status','Post created successfully');

        $user = Auth::user();
    $post = $user->posts()->create([
    'title' => $request->title,
    'body' => $request->body
]);
    return redirect(route('post_index'))->with('status', 'Post created successfully');




    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);
        // return view('edit',['post'=>$post]);
        return view('edit',compact('post'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // $post = Post::find($id);
        // $post -> title = $request->title;
        // $post -> body = $request->body;
        // $post->save();
        // return redirect(route('dashboard'))->with('status','Post updated successfully');

        $post = Post::find($id);
    $post->update([
    'title' => $request->title,
    'body' => $request->body
]);
return redirect(route('dashboard'))->with('status', 'Post updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // Post::destroy($id);       
        // return redirect(route('dashboard'))->with('status','Post  successfully');

        $post = Post::find($id);
        $post->comments()->delete();
        $post->delete();

    return redirect(route('dashboard'))->with('status','Post and its associated comments removed successfully');

    }
}
