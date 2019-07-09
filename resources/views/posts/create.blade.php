@extends('layouts.app')

@section('title', 'Admin | New Post')
@section('content')
<div class="row justify-content-center">
@component('components.post_form', [
    'action' => 'create',
    'categories' => $categories
])
@endcomponent
</div>
@endsection
