
<section class="col-sm">
    <a href="{{ Route('category', $category->name) }}" title="Click to see the entire category"><h2>{{ $category->name }}</h2></a>
@if($category->posts->count())
@foreach($category->top_posts() as $post)
@component('components.post_widget', [
    'post' => $post
])
@endcomponent
@endforeach
@if($category->top_posts()->count() < $category->posts->count())
<a href="{{ Route('category', $category->name) }}">See more</a>
@endif
@else
    <p>No posts were found in this category.</p>
@endif
</section>
