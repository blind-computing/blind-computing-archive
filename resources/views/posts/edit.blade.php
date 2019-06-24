@extends('layouts.app')

@section('title', 'Admin | Edit Post')
@section('content')
@if (isset($post))
<div class="row justify-content-center">
<div class="card-header col-md-10 justify-content-center" role="heading" aria-level="2">
<h1>Create Post</h1>
</div>
            <div class="card-body">
                <form method="POST" action="/posts">
                    @csrf

                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                name="title" value="{{ $post->title }}" required autocomplete="off" placeholder="Post Title">

                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="body" class="col-md-4 col-form-label text-md-right">Body</label>

                        <div class="col-md-6">
                            <textarea id="body" class="form-control ckeditor @error('body') is-invalid @enderror"
                                name="body" required autocomplete="off" rows="10">
{!! $post->body !!}
</textarea>

                            @error('body')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pinned" id="pinned" {{ $post->pinned ? ' checked':'' }}>

                                <label class="form-check-label" for="pinned">
                                    {{ __('Pin this post') }}
                                </label>
                            </div>
                        </div>
                    </div>

                                @if(isset($categories) && count($categories))
                    <div class="form-group row">
                        <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                        <div class="col-md-6">
                            <select id="category" class="form-control" name="category" required>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}"
@if($post->category_id == $category->id)
 selected
@endif
>{{ $category->name }}</option>
                                @endforeach
                            </select> </div>
                    </div>
                                @endif

<div class="row form-group mb-0 text-align-center justify-content-center">
                    <div class="mr-2 ml-auto mb-0">
                    <a href="{{ Route('posts.index') }}" class="btn btn-secondary" role="button">Cancel</a>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Publish') }}
                        </button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
</div>
@else
<p class="text-error">The specified post does not exist.</p>
@endif
@endsection
