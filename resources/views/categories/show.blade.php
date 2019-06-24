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
@if($category->parent_id == null && count($category->children))
<div class="row">
@foreach($category->children as $subcategory)
<section class="col-sm">
    <a href="{{ Route('category', $subcategory->name) }}" title="Click to see the entire category"><h2>{{ $subcategory->name }}</h2></a>
@if($subcategory->posts->count())
@foreach($subcategory->top_posts() as $post)
@component('components.post_widget', [
    'post' => $post
])
@endcomponent
@endforeach
@if($subcategory->top_posts()->count() < $subcategory->posts->count())
<a href="{{ Route('category', $subcategory->name) }}">See more</a>
@endif
@else
    <p>No posts were found in this category.</p>
@endif
</section>
@endforeach
</div>
@endif
@else
<p>Something went wrong. Please try again.</p>
@endif
@endsection
