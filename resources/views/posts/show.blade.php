@extends('layouts.main')

@section('title', 'Admin | View Post')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-2">
        <a href="{{ Route('posts.index') }}" class="btn btn-primary" role="button">Back to Posts</a>
    </div>
    <div class="col-md-4">
        <h1>View Post</h1>
    </div>
    <div class="col-md-2"></div>
</div>
@if (isset($post))
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card bg-dark" role="article">
            <header class="card-header post-header">
                <div class="post-header-top">
                    <h3 class="card-title post-title" aria-level="2">{{ $post->title }}</h3>
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
    </div>
</div>
@else
<p class="text-error">The specified post was not found</p>
@endif
@endsection
