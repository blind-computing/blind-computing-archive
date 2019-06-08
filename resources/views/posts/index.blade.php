@extends('layouts.app')

@if (Auth::user() && Auth::user()->type == 'admin')
@section('title', 'Admin | Posts')
@else
@section('title', 'Posts')
@endif
@section('content')
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <h1>Posts</h1>
    </div>
    <div class="col-sm-2">
        @if (Auth::user() && Auth::user()->type == 'admin')
        <a href="{{ Route('posts.create') }}" class="btn btn-primary" role="button">New Post</a>
        @endif
    </div>
</div>
@if (count($posts) >=1)
<div class="row justify-content-center">
    <div class="col-md-10">
        @foreach ($posts as $post)
        <div class="card bg-dark" role="article">
            <header class="card-header post-header">
                <div class="post-header-top">
                    <h3 class="card-title post-title" aria-level="2">
                        <a href="{{ Route('posts.show', $post->id) }}">{{ $post->title }}</a>
                    </h3>
                    @if ($post->pinned)
                    <img aria-label='Pin Icon'
                        src='http://icons.iconarchive.com/icons/paomedia/small-n-flat/32/pin-icon.png'>
                    @endif
                </div>
                <small class="text-muted">
                    Published on
                    <time datetime="{{ $post->created_at }}">{{ $post->created_at }}</time>
                    by <a href="/user/{{ $post->author_id }}">{{ $post->author->user_name }}</a>
                </small>
            </header>
            <div class="card-body">
                {!! $post->body !!}
            </div>
            @if (Auth::user() && Auth::user()->type == 'admin')
            <div class="card-footer">
                <form method="post" action="{{ Route('posts.destroy', $post->id) }}">
                    @csrf
                    <input type="hidden" name="_method" value="delete">
                    <a href="{{ Route('posts.edit', $post->id) }}" class="btn btn-default" role="button">Edit</a>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
            @endif
        </div>
        @endforeach
        {{ $posts->links() }}
    </div>
    @else
    <p>No posts were found</p>
    @endif
    @endsection
