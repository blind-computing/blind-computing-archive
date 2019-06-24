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
@each('components.category_column', $category->children, 'category');
</div>
@else
    {{-- display the posts --}}
{{-- check if we have any pinned poss and display them at the top --}}
@if($category->posts()->where('pinned', true)->count())
<section class="card-deck" aria-label="Pinned Posts">
@each('components.post_widget', $category->posts()->where('pinned', true)->get(), 'post')
</section>
@endif
@endif
@else
<p>Something went wrong. Please try again.</p>
@endif
@endsection
