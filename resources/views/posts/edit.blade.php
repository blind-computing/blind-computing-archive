@extends('layouts.app')

@section('title', 'Admin | Edit Post')
@section('content')
@if (isset($post))
<div class="row justify-content-center">
</div>
@component('components.post_form', [
    'action' => 'edit',
    'post' => $post,
    'categories' => $categories
])
@endcomponent
@else
<p class="text-error">The specified post does not exist.</p>
@endif
@endsection
