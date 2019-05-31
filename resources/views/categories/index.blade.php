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
<div class="row">
    <div class="col-sm-9">
        <h2>{{ $category->name }}</h2>
        <small class="text-muted"><strong>Parent:</strong>
            @if($category->parent_id != null)
            <a href="#category{{ $category->parent->id }}">{{ $category->parent->name }}</a>
            @else
            None
            @endif
        </small>
        <div class="category-description">
            {!! $category->description !!}
        </div>
    </div>
    <div class="col-sm-3">
        <a href="{{ Route('categories.edit', $category->id) }}" class="btn btn-default" role="button"
            aria-label="edit"><i class="fas fa-edit"></i></a>
        <a href="{{ Route('categories.delete', $category->id) }}" class="btn btn-default" role="button"
            aria-label="delete"><i class="fas fa-trash"></i></a>
    </div>
</div>
@endforeach
@else
<p>No categories were found.</p>
@endif
@endsection
