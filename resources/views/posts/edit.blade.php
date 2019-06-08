@extends('layouts.main')

@section('title', 'Admin | Edit Post')
@section('content')
<div class="row justify-content-center">
    <div class="col-sm-2">
        <a href="{{ Route('posts.index') }}" class="btn btn-primary" role="button">Back to Posts</a>
    </div>
    <div class="col-sm-4">
        <h1>Edit Post</h1>
    </div>
    <div class="col-sm-2"></div>
</div>
@if (isset($post))
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="/posts/{{ $post->id }}$request['pinned']">
                    @csrf
                    <!-- spoof a put request to allow posts to be edited -->
                    <input type="hidden" name="_method" value="put">

                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                name="title" value="{{ $post->title }}" required autocomplete="off" autofocus>

                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="body" class="col-md-4 col-form-label text-md-right">{{ __('Body') }}</label>

                        <div class="col-md-6">
                            <textarea id="body" class="form-control ckeditor @error('body') is-invalid @enderror"
                                name="body" required autocomplete="off" rows="10">
                            {{ $post->body }}
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
                                <input class="form-check-input" type="checkbox" name="pinned" id="pinned"
                                    {{ $post->pinned ? 'checked': '' }}>

                                <label class="form-check-label" for="pinned">
                                    {{ __('Pin this post') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-0 text-align-center justify-content-center">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Update') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@else
<p class="text-error">The specified post does not exist.</p>
@endif
@endsection
