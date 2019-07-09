<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Auth;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Only allow this if the user is an admin.
        if (Auth::user() && Auth::user()->type == 'admin') {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return View('posts.index', [
            'posts' => $posts
        ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Only allow this if the user is an admin.
        if (Auth::user() && Auth::user()->type == 'admin') {
            $categories = Category::all();
            return View('posts.create', [
                'categories' => $categories
            ]);
        } else {
            return Redirect('/')->with('error', 'You don\'t have permission to access the specified page.');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Only allow this if the user is an admin.
        if (Auth::user() && Auth::user()->type == 'admin') {
            $post = new Post();
            $post->title = $request['title'];
            $post->slug = $request['slug'];
            $post->body = $request['body'];
            $post->pinned = $request['pinned'] == 'on' ? true : false;
            $post->author_id = Auth::user()->id;
            $post->category_id = $request['category'];
            $post->save();
            return Redirect(Route('posts.index'))->with('success', 'Post published.');
        } else {
            return Redirect('/')->with('error', 'You don\'t have permission to access the specified page.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return View('posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Only allow this if the user is an admin.
        if (Auth::user() && Auth::user()->type == 'admin') {
            $post = Post::findOrFail($id);
            $categories = Category::all();
            return View('posts.edit', [
                'categories' => $categories,
                'post' => $post
            ]);
        } else {
            return Redirect('/')->with('error', 'You don\'t have permission to access the specified page.');
        }
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
        // Only allow this if the user is an admin.
        if (Auth::user() && Auth::user()->type == 'admin') {
            $post = Post::findOrFail($id);
            $post->title = $request['title'];
            $post->slug = $request['slug'];
            $post->body = $request['body'];
            $post->pinned = $request['pinned'] == 'on' ? true : false;
            $post->category_id = $request['category'];
            $post->save();
            return Redirect(Route('posts.index'))->with('success', 'Post edited.');
        } else {
            return Redirect('/')->with('error', 'You don\'t have permission to access the specified page.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Only allow this if the user is an admin.
        if (Auth::user() && Auth::user()->type == 'admin') {
            $post = Post::findOrFail($id);
            $post->delete();
            return Redirect(Route('posts.index'))->with('success', 'Post deleted.');
        } else {
            return Redirect('/')->with('error', 'You don\'t have permission to access the specified page.');
        }
    }
}
