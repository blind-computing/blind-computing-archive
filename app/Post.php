<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body', 'type', 'category_id', 'author_id',
    ];

    /**
     * Get the user that created this post.
     */
    public function author()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the category that this post belongs to.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

}
