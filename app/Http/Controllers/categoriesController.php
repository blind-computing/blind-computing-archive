<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $categories = Category::orderBy('created_at', 'asc')->get();
        return View('categories.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get all toplevel categories (we only ever have one level of subcategory).
        $categories = Category::where('parent_id', null)->orderBy('created_at', 'asc')->get();
        return View('categories.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create a new category object.
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        // If the parent is none, set parent_id to null.
        if ($request->parent == "0") {
            $category->parent_id = null;
        } else {
            $category->parent_id = $request->parent;
        }
        $category->save();
        return Redirect(Route('categories.index'))->with('success', 'Category created successfully.');
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
        // Get the specified category.
        $category = Category::findOrFail($id);
        // Also get all categories for the parent select.
        $categories = Category::where('parent_id', null)->orderBy('created_at', 'asc')->get();
        return View('categories.edit', [
            'category' => $category,
            'categories' => $categories
        ]);
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
        // Get the pre-existinig category.
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->description = $request->description;
        // If the parent is none, set parent_id to null.
        if ($request->parent == "0") {
            $category->parent_id = null;
        } else {
            $category->parent_id = $request->parent;
        }
        $category->save();
        return Redirect(Route('categories.index'))->with('success', 'Category updated successfully.');
        // Update its properties.
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
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
    }
}
