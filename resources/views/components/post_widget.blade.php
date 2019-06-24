<div class="card @if($post->pinned)bg-light  @endif">
    <div class="card-header"><a href=""><h3 class="card-title">{{ $post->title }}</h3></a></div>
    <div class="card-body">
<p class="card-text">{{ $post->preview() }}</p>
</div>
    <div class="card-footer" role="contentinfo"><strong>Published on</strong>
 <time datetime={{ $post->created_at }}">{{ $post->created_at }}</time>
 <strong>by</strong> <a href="{{ Route('profile', $post->author->user_name) }}">{{ __('@' . $post->author->user_name) }}</a>
</div>
