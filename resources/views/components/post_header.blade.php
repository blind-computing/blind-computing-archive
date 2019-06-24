<div class="post-header">
    <div class="row">
    <div class="col-sm-9">
        @if($linked)
        <a href="{{ Route('post', $post->name) }}">
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
    <form class="ml-auto mr-1" action="{{ Route('categories.destroy', $post->id) }}" method="post">
        @method('delete')
        @csrf
        <a href="{{ Route('categories.edit', $post->id) }}" class="btn btn-default" role="button"
            aria-label="edit"><i class="fas fa-edit"></i></a>
        <button class="btn btn-danger" aria-label="delete"><i class="fas fa-trash"></i></button>
    </form>
    @endif
</div>
<div class="post-info">
<table>
    <tbody>
        <tr class="row">
            <th class="col-3">Author:</th>
            <td class="col">{{ $post->author->full_name }} <a href="{{ Route('profile', $post->author->user_name) }}">{{ '(@' . $post->author->user_name . ')' }}</a></td>
        </tr>
        <tr class="row">
            <th class="col-3">Published On:</th>
            <td class="col"><time datetime="{{ $post->created_at }}">{{ $post->created_at }}</time></td>
</tr>
@if($post->created_at != $post->updated_at)
        <tr class="row">
            <th class="col-3">Edited On:</th>
            <td class="col"><time datetime="{{ $post->updated_at }}">{{ $post->updated_at }}</time></td>
</tr>
@endif
    </tbody>
</table>
</div>
</div>
</div>
