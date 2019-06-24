<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Get the parent category (if any)
     */
    public function parent()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * Get all categories with this one as their parent (if any)
     */
    public function children()
    {
        return $this->hasMany('App\Category', 'parent_id');
    }

    /**
     * Get the posts categorised under this category.
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    /**
     * Get the top posts (displayed in subcategory columns on parent category pages).
     */
    public function top_posts()
    {
        /// Get all pinned posts
        $pinned_posts = $this->posts()->where('pinned', true)->orderBy('created_at', 'asc')->get();
        // Calculate how many more posts we need to fill 3 spaces.
        $extra_posts = 3 - count($pinned_posts) < 0?
            1: 3 - count($pinned_posts);
        // Get this many normal posts, in reverse chronological order, from the database.
        $recent_posts = $this->posts()->where('pinned', false)->orderBy('created_at', 'desc')->take($extra_posts)->get();
        // Finally, merge the two datasets and return them.
        return $pinned_posts->merge($recent_posts);
    }
}
