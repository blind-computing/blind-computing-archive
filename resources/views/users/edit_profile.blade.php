@extends('layouts.app')

@section('title', 'Edit Profile')
@section('content')
<div class="row">
    <a href="{{ Route('profile') }}" class="btn btn-secondary mr-2" role="button">Back</a>
    <h1>Edit Profile</h1>
    <div class="ml-auto mr-2">
        <form action="/profile" method="post">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-primary">Save</button>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        <img src="{{ Auth::user()->profile_picture }}" aria-label="Profile picture for {{ Auth::user()->full_name }}"
            style="width: 100%;">
        <input type="file" class="form-control-file border" name="profilepicture" title="choose a new profile picture.">
        <p>Select a new profile picture. Images must be less than 700&times;700. All common formats are supported.</p>
    </div>
    <div class="col">
        <div class="form-group row">
            <input type="text" class="form-control form-control-lg col-md-10" id="fullname" name="fullname"
                value="{{ Auth::user()->full_name }}" aria-label="Full Name" placeholder="Full Name">
        </div>
        <div class="form-group row">
            <div class="input-group col-md-10">
                <label id="username-lbl1" class="d-none">User Name</label>
                <div class="input-group-prepend">
                    <label id="username-lbl2" class="input-group-text">@</label>
                </div>
                <input type="text" class="form-control" id="username" name="username"
                    value="{{ Auth::user()->user_name  }}" placeholder="username"
                    aria-labelledby="username-lbl1 username-lbl2">
            </div>
        </div>
        <div class="card">
            <div class="card-header" role="heading" aria-level="2">Social & Contact Info</div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="email" class="form-label col-md-2">Email Address:</label>
                    <input type="email" class="form-control col-md-6" id="email" name="email"
                        value="{{ Auth::user()->email }}" placeholder="someone@example.com" required>
                    <div class="form-check col-md-4">
                        <label for="publicemail" class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="publicemail" name="publicemail"
                                {{ Auth::user()->public_email ? 'checked':'' }}>
                            Make my email public
                        </label>
                    </div>
                </div>
                <div class="form-group row">
                    <label id="twitter-lbl1" class="form-label col-md-2">Twitter:</label>
                    <div class="input-group col-md-6">
                        <div class="input-group-prepend">
                            <label id="twitter-lbl2" class="input-group-text">@</label>
                        </div>
                        <input type="text" class="form-control" id="twitter" value="{{ Auth::user()->twitter }}"
                            aria-labelledby="twitter-lbl1 twitter-lbl2" placeholder="twitter_handle"
                            pattern="[a-zA-Z0-9_]{1,15}">
                    </div>
                </div>
                <div class="form-group row">
                    <label id="mastodon-lbl1" class="form-label col-md-2">Mastodon</label>
                    <div class="input-group col-md-6">
                        <div class="input-group-prepend">
                            <label id="mastodon-lbl2" class="input-group-text">@</label>
                        </div>
                        <input type="text" class="form-control" id="mastodon" value="{{ Auth::user()->mastodon }}"
                            aria-labelledby="mastodon-lbl1 mastodon-lbl2" placeholder="mastodon_user@some.server"
                            pattern="[a-zA-Z0-9_]+@[a-zA-Z0-9_\.]+">
                    </div>
                </div>
                <div class="form-group row">
                    <label id="discord-lbl1" class="form-label col-md-2">Discord</label>
                    <div class="input-group col-md-6">
                        <div class="input-group-prepend">
                            <label id="discord-lbl2" class="input-group-text">@</label>
                        </div>
                        <input type="text" class="form-control" id="discord" value="{{ Auth::user()->discord }}"
                            aria-labelledby="discord-lbl1 discord-lbl2" placeholder="someone#1234"
                            pattern="[^#]{2,32}#\d{4}">
                    </div>
                </div>
                <div class="form-group row">
                    <label id="github-lbl1" class="form-label col-md-2">Github</label>
                    <div class="input-group col-md-6">
                        <div class="input-group-prepend">
                            <label id="github-lbl2" class="input-group-text">@</label>
                        </div>
                        <input type="text" class="form-control" id="github" value="{{ Auth::user()->github }}"
                            aria-labelledby="github-lbl1 github-lbl2" placeholder="someuser"
                            pattern=([a-zA-Z0-9](?:-?[a-zA-Z0-9]){1,38})"">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="youtube" class="form-label col-md-2">YouTube</label>
                    <input type="url" class="form-control col-md-6" id="youtube" value="{{ Auth::user()->youtube }}"
                        placeholder="https://youtube.com/channel/user-id12345"
                        pattern="((http|https):\/\/|)(www\.|)youtube\.com\/(channel\/|user\/)[a-zA-Z0-9\-]{1,}">
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<hr>
<div class="card">
    <div id="bio-label" class="card-header" role="heading" aria-level="2">Bio</div>
    <textarea id="bio" name="bio" class="form-control ckeditor @error('bio') is-invalid @enderror"
        aria-labelledby="bio-heading" placeholder="Say something about yourself.">
    {!! isset(Auth::user()->bio) ? Auth::user()->bio: '' !!}
</textarea>
</div>
@error('bio')
<div class="card-footer">
    <div class="bg-danger">
        {{ $message }}
    </div>
</div>
@enderror
</div>
</form>
@endsection
