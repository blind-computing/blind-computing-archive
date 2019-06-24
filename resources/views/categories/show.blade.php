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
@component('components.category_column', [
    'category' => $subcategory
])
@endcomponent
@endforeach
</div>
@endif
@else
<p>Something went wrong. Please try again.</p>
@endif
@endsection
