@extends('layouts.app')

@section('title', 'Admin | Create Category')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
@component('components.category_form', [
    'action' => 'create',
    'categories' => $categories
])
@endcomponent
    </div>
</div>
@endsection
