<div class="post-header">
    <div class="row">
    <div class="col-sm-9">
        @if($linked)
        <a href="{{ Route('posts.show', $post->id) }}">
            <h2>
                @else
                <h1>
                    @endif
                    {{ $post->title }}
                    @if($linked)
            </h2>
        </a>
        @else
        </h1>
        @endif
    </div>

    @if(Auth::check() && Auth::user()->type == 'admin')
    <form class="ml-auto mr-1" action="{{ Route('posts.destroy', $post->id) }}" method="post">
        @method('delete')
        @csrf
        <a href="{{ Route('posts.edit', $post->id) }}" class="btn btn-default" role="button"
            aria-label="edit"><i class="fas fa-edit"></i></a>
        <button class="btn btn-danger" aria-label="delete"><i class="fas fa-trash"></i></button>
    </form>
    @endif
</div>
@if($show_info)
@component('components.post_info', [
    'post' => $post
])
@endcomponent
@endif
</div>
</div>
