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
        <h2><a href="{{ Route('categories.show', $category->id) }}">{{ $category->name }}</a></h2>
        <small class="text-muted"><strong>Parent:</strong>
            @if($category->parent_id != null)
            <a href="{{ Route('categories.show', $category->parent->id) }}">{{ $category->parent->name }}</a>
            @else
            None
            @endif
        </small>
        <div class="category-description">
            {!! $category->description !!}
        </div>
    </div>
    <form class="ml-auto mr-1" action="{{ Route('categories.destroy', $category->id) }}" method="post">
        <a href="{{ Route('categories.edit', $category->id) }}" class="btn btn-default" role="button"
            aria-label="edit"><i class="fas fa-edit"></i></a>
        <button class="btn btn-default" aria-label="delete"><i class="fas fa-trash"></i></button>
        <input type="hidden" name="_method" value="delete">
    </form>
</div>
@endforeach
@else
<p>No categories were found.</p>
@endif
@endsection
