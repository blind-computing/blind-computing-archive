<section class="col-sm">
    <a href="{{ Route('category', $category->slug) }}" title="Click to see the entire category"><h2>{{ $category->name }}</h2></a>
@if($category->posts->count())
@each('components.post_widget', $category->top_posts(), 'post')
@if($category->top_posts()->count() < $category->posts->count())
<a href="{{ Route('category', $category->slug) }}">See more</a>
@endif
@else
    <p>No posts were found in this category.</p>
@endif
</section>
