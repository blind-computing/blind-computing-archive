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
}
