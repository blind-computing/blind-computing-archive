@extends('layouts.app')

@section('title', 'Admin | View Post')
@section('content')
@component('components.post_header', [
    'post' => $post,
    'linked' => false
])
@endcomponent
@endsection
