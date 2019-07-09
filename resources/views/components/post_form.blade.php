<div class="card col-md-10">
<div class="card-header" role="heading" aria-level="1">
<h1>{{ ucfirst($action) }} Post</h1>
</div>
            <div class="card-body">
@if($action == 'edit')
                <form method="POST" action="{{ Route('posts.update', $post->id) }}">
                    @method('put')
                    @else
                <form method="POST" action="{{ Route('posts.store') }}">
                        @endif
                    @csrf
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                name="title" value="{{ isset($post)? $post->title: '' }}" required autocomplete="off" placeholder="Post Title">

                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="slug" class="col-md-4 col-form-label text-md-right">Slug</label>

                        <div class="col-md-6">
                            <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror"
                                name="slug" value="{{ isset($post)? $post->slug: '' }}" required autocomplete="off" title="The part of the URL specific to this post">

                            @error('slug')
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
{!! isset($post)? $post->body: '' !!}
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
                                <input class="form-check-input" type="checkbox" name="pinned" id="pinned" {{ isset($post) && $post->pinned ? ' checked':'' }}>

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
@if(isset($post) && $post->category_id == $category->id)
 selected="selected"
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
                            {{ __(isset($post)? 'Update': 'Publish') }}
                        </button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
