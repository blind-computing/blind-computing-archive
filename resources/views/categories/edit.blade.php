@extends('layouts.app')

@section('title', 'Admin | Edit Category')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header" role="heading" aria-level="1">{{ __('Create Category') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('categories.update', $category->id) }}">
                    @csrf

                    <input type="hidden" name="_method" value="put">

                    <div class="form-group row">
                        <label for="name"
                            class="col-md-4 col-form-label text-md-right">{{ __('Category Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ $category->name }}" required autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description"
                            class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                        <div class="col-md-6">
                            <textarea id="description"
                                class="ckeditor form-control @error('description') is-invalid @enderror"
                                name="description" required>
                            {{ $category->description }}
                            </textarea>

                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="parent" class="col-md-4 col-form-label text-md-right">{{ __('parent') }}</label>

                        <div class="col-md-6">
                            <select id="parent" class="form-control" name="parent" required>
                                <option value="0" @if($category->parent_id == null)
                                    selected="selected"
                                    @endif
                                    >None</option>
                                @if(isset($categories) && count($categories))
                                @foreach($categories as $loop_category)
                                <option value="{{ $loop_category->id }}" @if($category->parent_id == $loop_category->id)
                                    selected="selected"
                                    @endif
                                    >{{ $loop_category->name }}</option>
                                @endforeach
                                @endif
                            </select> </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <a href="{{ Route('categories.index') }}" class="btn btn-secondary mr-2" role="button">
                                {{ __('Cancel') }}
                            </a>
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
