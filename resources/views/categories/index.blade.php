@extends('layouts.app')

@section('title', 'Admin | Categories')
@section('content')
<div class="row">
    <h1>Categories</h1>
    <a href="/admin/categories/create" class="btn btn-default ml-auto mr-1" role="button"
        aria-label="New Category">+</a>
</div>
@if(count($categories))
@foreach($categories as $category)
@component('components.category_header', [
'category' => $category,
'linked' => true
])
@endcomponent
@endforeach
@else
<p>No categories were found.</p>
@endif
@endsection
