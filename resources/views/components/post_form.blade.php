<div class="card tab-pane @if($active) active @endif" id="{{ $type . '-pane' }}" role="tabpanel" aria-labelledby="{{ $type . '-tab' }}">
<div class="card-header" role="heading" aria-level="2">
    {{ __(ucfirst($type)) }}
</div>
            <div class="card-body">
                <form method="POST" action="/posts">
                    @csrf

                    <div class="form-group row">
                        <label for="{{ $type . '-title' }}" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                        <div class="col-md-6">
                            <input id="{{ $type . '-title' }}" type="text" class="form-control @error('title') is-invalid @enderror"
                                name="title" value="" required autocomplete="off">

                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="{{ $type . '-body' }}" class="col-md-4 col-form-label text-md-right">{{ __('Body') }}</label>

                        <div class="col-md-6">
                            <textarea id="{{ $type . '-body' }}" class="form-control ckeditor @error('body') is-invalid @enderror"
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
                                <input class="form-check-input" type="checkbox" name="pinned" id="{{ $type . '-pinned' }}">

                                <label class="form-check-label" for="{{ $type . '-pinned' }}">
                                    {{ __('Pin this post') }}
                                </label>
                            </div>
                        </div>
                    </div>

@isset($extra_options)
<h3>{{ __(ucfirst($type) . ' Specific Options') }}</h3>
{!! $extra_options !!}
@endisset

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