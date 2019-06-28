@extends('layouts.app')

@if(isset($category))
@section('title', $category->name)
@else
@section('title', 'View Category')
@endif
@section('content')
@if(isset($category))
@component('components.category_header', [
'category' => $category,
'linked' => false
])
@endcomponent
<hr>
{{-- check whether this is a toplevel or sub category --}}
@if($category->parent_id == null && count($category->children))
{{-- display the subcategories --}}
<div class="row">
@each('components.category_column', $category->children, 'category')
</div>
@else
    {{-- display the posts if we have any --}}
@if($category->posts->count())
{{-- check if we have any pinned posts and display them at the top --}}
@if($pinned_posts->count())
<section class="card-deck" aria-label="Pinned Posts">
@each('components.post_widget', $pinned_posts, 'post')
</section><hr>
@endif
@if($unpinned_posts->count())
@each('components.post_widget_horizontal', $unpinned_posts, 'post')
{{ $unpinned_posts->links() }}
@endif
@else
<p>No posts were found in this category.</p>
@endif
{{-- there are no posts --}}
@endif
@else
<p>Something went wrong. Please try again.</p>
@endif
@endsection
