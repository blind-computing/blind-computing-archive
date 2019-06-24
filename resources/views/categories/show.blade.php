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
<div class="col-md">
    <a href="{{ Route('category', $subcategory->name) }}"><h2>{{ $subcategory->name }}</h2></a>
@foreach($subcategory->posts()->where('pinned', true)->get() as $post)
@component('components.post_widget', [
    'post' => $post
])
@endcomponent
@endforeach
</div>
@endforeach
</div>
@endif
@else
<p>Something went wrong. Please try again.</p>
@endif
@endsection
