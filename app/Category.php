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
        return $this->hasOne('App\Category', 'parent_id');
    }
}
