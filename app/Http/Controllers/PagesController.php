<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class pagesController extends Controller
{
    /**
     * Show the home page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show a category.
     * This works much like CategoriesController@show, but isn't hidden behind the admin panel and has a different route to make it more friendly.
     * @param string $name
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showCategory(string $slug)
    {
        // Get the category by its slug.
        $category = Category::where('slug', $slug)->take(1)->get();
        if (count($category)) {
            // Also get all of its posts, both pinned and not pinned.
        $pinned_posts = $category[0]->posts()->where('pinned', true)->orderBy('created_at', 'asc')->get();
        $unpinned_posts = $category[0]->posts()->where('pinned', false)->orderBy('created_at', 'desc')->paginate(10);
            return View('categories.show', [
                'category' => $category[0],
                'pinned_posts' => $pinned_posts,
                'unpinned_posts' => $unpinned_posts
            ]);
        } else {
            return abort(404);
        }
    }

/**
     * Show a post.
     * This works much like postsController@show, but isn't hidden behind the admin panel and has a different route to make it more friendly.
     * @param string $name
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showPost(string $slug)
    {
        // Get the post by its slug.
        $post = Post::where('slug', $slug)->take(1)->get();
        if (count($post)) {
            return View('posts.show', [
                'post' => $post[0]
            ]);
        } else {
            return abort(404);
        }
    }
}
