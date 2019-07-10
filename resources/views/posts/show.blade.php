@extends('layouts.app')

@if(Route::currentRouteName() == 'post' && isset($post))
@section('title', $post->title)
@else
@section('title', 'Admin | View Post')
@endif
@section('content')
@isset($post)
{{-- figure out whether this is a video or an article post. --}}
@php
$is_video = $post->yt_video_id != null;
@endphp
@component('components.post_header', [
    'post' => $post,
    'linked' => false,
    'show_info' => !$is_video
])
@endcomponent
<hr>
@if($is_video)
{!! $post->video_preamble !!}
<div class="row">
    <div class="col-md-8">
{{-- Embed the video here. --}}
@component('components.yt_embed', [
    'video_id' => $post->yt_video_id,
    'height' => '67vh'
])
@endcomponent
</div>
    <div class="col-md-4">
{{-- Display the video info --}}
<h2>Video Information</h2>
@component('components.post_info', [
    'post' => $post
])
@endcomponent
<h3>Description</h3>
{!! $post->body !!}
</div>
</div>
@else
{!! $post->body !!}
@endif
@else
    <p style="text-error">The specified post does not exist</p>
    @if(Auth::check() && Auth::user()->type == 'admin')
<a class="btn btn-default" href="{{ Route('posts.index') }}">Back to Index</a>
@endif
@endisset
@endsection
