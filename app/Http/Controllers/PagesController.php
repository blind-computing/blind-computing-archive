<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

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
    public function showCategory(string $name)
    {
        // Replace the - char with a space in the name.
        // This makes much nicer looking links.
        $name = str_replace('-', ' ', $name);
        // Get the category by name.
        $category = Category::where('name', $name)->take(1)->get();
        if (count($category)) {
            return View('categories.show', [
                'category' => $category[0]
            ]);
        } else {
            return abort(404);
        }
    }
}
