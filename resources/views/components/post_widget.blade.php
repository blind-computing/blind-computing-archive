<div class="card">
    <div class="card-header" role="heading" aria-level="3"><a href="">{{ $post->title }}</a></div>
    <div class="card-body">
{{ $post->preview() }}
</div>
    <div class="card-footer" role="contentinfo">Published on
<time datetime={{ $post->created_at }}">{{ $post->created_at }}</time>
 by <a href="{{ Route('profile', $post->author->user_name) }}">{{ __('@' . $post->author->user_name) }}</a>
@if($post->created_at != $post->updated_at)
<br>Last edited on <time datetime={{ $post->created_at }}">{{ $post->created_at }}</time>
@endif
</div>
