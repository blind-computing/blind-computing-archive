<?php

namespace App;

use Html2Text;
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

    /**
     *A shorter body used as a preview on category post listings.
     @return string
     */
    public function preview()
    {
        // First, convert the body to plane text.
        $body_text = (new Html2Text\Html2Text($this->body))->getText();
        // Next get the plane text body as an array of words.
        $body_array = explode($body_text, ' ');
        // If this is less than 20, just return the body (it's short enough).
        if(count($body_array) <= 20)
        {
            return $body_text;
        }
        // If not (it's longer) take only the first 20 words.
        return implode(array_slice($body_array, 0, 19), ' ') . ' ...';
    }
}
