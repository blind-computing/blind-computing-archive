@extends('layouts.app')

@section('title', 'Page Not Implemented')
@section('content')
<div class="text-center">
    <h1>Page Not Implemented</h1>
    <p>Sorry, the page you selected does not currently exist. Feel free to <a href="{{ Route('home') }}">go back to the
            home page</a>.</p>
</div>
@endsection
