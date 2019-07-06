<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;

class categoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Only if the user is an admin.
        if(Auth::check() && Auth::user()->type == 'admin') {
        $categories = Category::orderBy('created_at', 'asc')->get();
        return View('categories.index', [
            'categories' => $categories
        ]);
    } else {
        return Redirect(Route('home'))->with('error', 'You don\'t have permission to access the specified resource.');
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
                // Only if the user is an admin.
        if(Auth::check() && Auth::user()->type == 'admin') {
        // Get all toplevel categories (we only ever have one level of subcategory).
        $categories = Category::where('parent_id', null)->orderBy('created_at', 'asc')->get();
        return View('categories.create', [
            'categories' => $categories
        ]);
     } else {
        return Redirect(Route('home'))->with('error', 'You don\'t have permission to access the specified resource.');
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
                        // Only if the user is an admin.
        if(Auth::check() && Auth::user()->type == 'admin') {
        // Create a new category object.
        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        // If the parent is none, set parent_id to null.
        if ($request->parent == "0") {
            $category->parent_id = null;
        } else {
            $category->parent_id = $request->parent;
        }
        $category->save();
        return Redirect(Route('categories.index'))->with('success', 'Category created successfully.');
             } else {
        return Redirect(Route('home'))->with('error', 'You don\'t have permission to access the specified resource.');
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
        // Get the category.
        $category = Category::findOrFail($id);
            // Also get all of its posts, both pinned and not pinned.
        $pinned_posts = $category->posts()->where('pinned', true)->orderBy('created_at', 'asc')->get();
        $unpinned_posts = $category->posts()->where('pinned', false)->orderBy('created_at', 'desc')->paginate(10);
        return View('categories.show', [
            'category' => $category,
            'pinned_posts' => $pinned_posts,
            'unpinned_posts' => $unpinned_posts
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
                                // Only if the user is an admin.
        if(Auth::check() && Auth::user()->type == 'admin') {
        // Get the specified category.
        $category = Category::findOrFail($id);
        // Also get all categories for the parent select.
        $categories = Category::where('parent_id', null)->orderBy('created_at', 'asc')->get();
        return View('categories.edit', [
            'category' => $category,
            'categories' => $categories
        ]);
                     } else {
        return Redirect(Route('home'))->with('error', 'You don\'t have permission to access the specified resource.');
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
                                        // Only if the user is an admin.
        if(Auth::check() && Auth::user()->type == 'admin') {
        // Get the pre-existinig category.
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        // If the parent is none, set parent_id to null.
        if ($request->parent == "0") {
            $category->parent_id = null;
        } else {
            $category->parent_id = $request->parent;
        }
        $category->save();
        return Redirect(Route('categories.index'))->with('success', 'Category updated successfully.');
                             } else {
        return Redirect(Route('home'))->with('error', 'You don\'t have permission to access the specified resource.');
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
                                                // Only if the user is an admin.
        if(Auth::check() && Auth::user()->type == 'admin') {
        // Get the category.
        $category = Category::findOrFail($id);
        // Reparent any child categories that belong to this category.
        if (count($category->children)) {
            foreach ($category->children as $child) {
                $child->parent_id = null;
                $child->save();
            }
        }
        // delete it.
        $category->delete();
        return Redirect(Route('categories.index'))->with('success', 'Category deleted successfully.');
                                 } else {
        return Redirect(Route('home'))->with('error', 'You don\'t have permission to access the specified resource.');
    }
}
}
