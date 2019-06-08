@extends('layouts.app')

@section('title', 'Admin | New Post')
@section('content')
<div class="row justify-content-center">
    <div class="col-sm-2">
        <a href="{{ Route('posts.index') }}" class="btn btn-primary" role="button">Back to Posts</a>
    </div>
    <div class="col-sm-4">
        <h1>Create Post</h1>
    </div>
    <div class="col-sm-2"></div>
</div>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="/posts">
                    @csrf

                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                name="title" value="" required autocomplete="off" autofocus>

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
                                name="body" required autocomplete="off" rows="10"></textarea>

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
                                <input class="form-check-input" type="checkbox" name="pinned" id="pinned">

                                <label class="form-check-label" for="pinned">
                                    {{ __('Pin this post') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-0 text-align-center justify-content-center">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Publish') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
