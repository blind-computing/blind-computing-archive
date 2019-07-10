<div class="post-info">
@if(auth::check() && auth::user()->type == 'admin')
<strong>URL Slug:</strong> {{ $post->slug }}<br>
@endif
Published on <time datetime="{{ $post->created_at }}">{{ $post->created_at }}</time> by <a href="{{ Route('profile', $post->author->user_name) }}" title="View {{ $post->author->full_name . "'s" }} profile">{{ '(@' . $post->author->user_name . ')' }}</a> in category <a href="{{ Route('category', $post->category->slug) }}">{{ $post->category->name }}</a>
@if($post->updated_at != null)
<br>Edited on <time datetime="{{ $post->updated_at }}">{{ $post->updated_at }}</time>
@endif
</div>
