@extends('layouts.app')

@section('title', 'Admin | New Post')
@section('content')
<h1>Create Post</h1>
<ul class="nav nav-tabs nav-justified" role="tablist">
    <li id="article-tab" role="tab" aria-controls="article-pane" class="nav-item active"><a data-toggle="tab" href="#article-pane" class="nav-link">Article</a></li>
    <li id="video-tab" role="tab" aria-controls="video-pane" class="nav-item"><a data-toggle="tab" href="#video-pane" class="nav-link">Video</a></li>
    <li id="download-tab" role="tab" aria-controls="download-pane" class="nav-item"><a data-toggle="tab" href="#download-pane" class="nav-link">Download</a></li>
</ul>
<div class="tab-content">
@component('components.post_form', [
'type' => 'article',
'active' => true,
])
@slot('extra_options')
test
@endslot
@endcomponent
@component('components.post_form', [
'type' => 'video',
'active' => false,
])
@slot('extra_options')
test
@endslot
@endcomponent
@component('components.post_form', [
'type' => 'download',
'active' => false,
])
@slot('extra_options')
test
@endslot
@endcomponent
</div>
<script type="text/javascript">
$('[data-toggle="tab"]').click(function(){
$('[data-toggle="tab"]').set('aria-selected', 'false');
$(this).set('aria-selected', 'true');
});
</script>
@endsection
