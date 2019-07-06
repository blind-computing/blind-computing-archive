<div class="card">
    <div class="card-header" role="heading" aria-level="1">{{ __(ucfirst($action) . ' Category') }}</div>

    <div class="card-body">
        <form method="POST" action="{{ route('categories.store') }}">
            @csrf
@if($action == 'edit')
@method('put')
@endif

            <div class="form-group row">
                <label for="name"
                    class="col-md-4 col-form-label text-md-right">{{ __('Category Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ isset($category)? $category->name: '' }}" required autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="slug"
                    class="col-md-4 col-form-label text-md-right">{{ __('Category Slug') }}</label>

                <div class="col-md-6">
                    <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror"
                        name="slug" value="{{ isset($category)? $category->slug: '' }}" title="The category specific portion of the URL associated with this category." required>

                    @error('slug')
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
                        name="description" required>{!! isset($category)? $category->description: '' !!}</textarea>

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
                        <option value="0">None</option>
                        @if(isset($categories) && count($categories))
                        @foreach($categories as $parent_category)
                        <option value="{{ $parent_category->id }}" {{ $category->parent_id == $parent_category->id ? 'selected':'' }}>{{ $parent_category->name }}</option>
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
                        {{ __($action == 'create' ? 'Create': 'Update') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
