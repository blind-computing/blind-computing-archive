<div class="post">
    <a href="{{ Route('post', $post->slug) }}"><h3>{{ $post->title }}</h3></a>
<strong>Published on</strong> <time datetime={{ $post->created_at }}">{{ $post->created_at }}</time>
 <strong>by</strong> <a href="{{ Route('profile', $post->author->user_name) }}">{{ __('@' . $post->author->user_name) }}</a>
<p>{{ $post->preview() }}</p>
<a href="{{ Route('post', $post->slug) }}">Read more</a>
</div>
