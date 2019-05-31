@extends('layouts.app')

@if(isset($category))
@section('title', $category->name)
@else
@section('title', 'View Category')
@endif
@section('content')
@if(isset($category))
<div class="row">
    <div class="col-sm-9">
        <h1>{{ $category->name }}</h1>
        @if(Auth::check() && Auth::user()->type == 'admin')
        <small class="text-muted"><strong>Parent:</strong>
            @if($category->parent_id != null)
            {{ $category->parent->name }}
            @else
            None
            @endif
        </small>
        @endif
    </div>
    @if(Auth::check() && Auth::user()->type == 'admin')
    <form class="ml-auto mr-1" action="{{ Route('categories.destroy', $category->id) }}" method="post">
        @csrf
        <a href="{{ Route('categories.edit', $category->id) }}" class="btn btn-default" role="button"
            aria-label="edit"><i class="fas fa-edit"></i></a>
        <input type="hidden" name="_method" value="delete">
        <button class="btn btn-danger" aria-label="delete"><i class="fas fa-trash"></i></button>
    </form>
    @endif
</div>
<div class="category-description">
    {!! $category->description !!}
</div>
<p>Sub-categories and posts are yet to be implemented.</p>
@else
<p>Something went wrong. Please try again.</p>
@endif
@endsection
