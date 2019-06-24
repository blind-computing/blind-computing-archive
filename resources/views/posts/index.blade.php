@extends('layouts.app')

@section('title', 'Admin | Posts')
@section('content')
<div class="row mb-2">
    <div class="col-sm-9">
        <h1>Posts</h1>
    </div>
    <div class="ml-auto mr-2">
        <a href="{{ Route('posts.create') }}" class="btn btn-primary" role="button">New Post</a>
    </div>
</div>
        </div>
        @if (count($posts) >=1)
        {{ $posts->links() }}
        @foreach ($posts as $post)
        @component('components.post_header', [
    'post' => $post,
    'linked' => true
])
@endcomponent
        @endforeach
        {{ $posts->links() }}
    </div>
    @else
    <p>No posts were found</p>
    @endif
    @endsection
