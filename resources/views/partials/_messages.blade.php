@if(count($errors) > 0)
@foreach($errors->all() as $error)
<div class="alert alert-danger alert-dismissible" role="alert">
    {{$error}}
    <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
</div>
@endforeach
@endif

@if(session('success'))
<div class="alert alert-success alert-dismissible" role="alert">
    {{session('success')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible" role="alert">
    {{session('error')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
</div>
@endif
