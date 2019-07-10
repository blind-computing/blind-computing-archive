@extends('layouts.app')

@if(Route::currentRouteName() == 'post' && isset($post))
@section('title', $post->title)
@else
@section('title', 'Admin | View Post')
@endif
@section('content')
@isset($post)
@component('components.post_header', [
    'post' => $post,
    'linked' => false,
    'show_info' => $post->yt_video_id != null
])
@endcomponent
<hr>
{!! $post->body !!}
@else
    <p style="text-error">The specified post does not exist</p>
    @if(Auth::check() && Auth::user()->type == 'admin')
<a class="btn btn-default" href="{{ Route('posts.index') }}">Back to Index</a>
@endif
@endisset
@endsection
