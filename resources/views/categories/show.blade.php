@extends('layouts.app')

@if(isset($category))
@section('title', $category->name)
@else
@section('title', 'View Category')
@endif
@section('content')
@if(isset($category))
@component('components.category_header', [
'category' => $category,
'linked' => false
])
@endcomponent
<p>Sub-categories and posts are yet to be implemented.</p>
@else
<p>Something went wrong. Please try again.</p>
@endif
@endsection
