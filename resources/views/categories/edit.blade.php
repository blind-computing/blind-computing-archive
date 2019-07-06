@extends('layouts.app')

@section('title', 'Admin | Edit Category')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
@component('components.category_form', [
    'action' => 'edit',
    'category' => $category
])
@endcomponent
    </div>
</div>
@endsection
