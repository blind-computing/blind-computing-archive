@extends('layouts.app')

@section('title', 'Admin | View Post')
@section('content')
@isset($post)
@component('components.post_header', [
    'post' => $post,
    'linked' => false
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
