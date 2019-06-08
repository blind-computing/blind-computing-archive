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
            <input type="text" class="form-control form-control-lg col-md-10 @error('fullname') is-invalid @enderror" id="fullname" name="fullname"
                value="{{ Auth::user()->full_name }}" aria-label="Full Name" placeholder="Full Name">
                @error('fullname')
                            <div class="col-md-2 invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
        </div>
        <div class="form-group row">
            <div class="input-group col-md-10">
                <label id="username-lbl1" class="d-none">User Name</label>
                <div class="input-group-prepend">
                    <label id="username-lbl2" class="input-group-text">@</label>
                </div>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username"
                    value="{{ Auth::user()->user_name  }}" placeholder="username"
                    aria-labelledby="username-lbl1 username-lbl2">
            </div>
            @error('username')
                            <div class="col-md-2 invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
        </div>
        <div class="card">
            <div class="card-header" role="heading" aria-level="2">Social & Contact Info</div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="email" class="form-label col-md-2">Email Address:</label>
                    <div class="col-md-6">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                        value="{{ Auth::user()->email }}" placeholder="someone@example.com" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    <div class="form-check col-md-4">
                        <label for="publicemail" class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="publicemail" name="publicemail"
                                {{ Auth::user()->public_email ? 'checked':'' }}>
                            Make my email public
                        </label>
                    </div>
                </div>
                @component('components.profile_form_row', [
                'name' => 'twitter',
                'placeholder' => 'twitter_handle',
                'label' => 'Twitter',
                'pattern' => '[a-zA-Z0-9_]{1,15}',
                'prepend_at' => true
                ])
                {{ Auth::user()->twitter }}
                @endcomponent
                @component('components.profile_form_row', [
                'name' => 'mastodon',
                'placeholder' => 'mastodon_user@some.server',
                'label' => 'Mastodon',
                'pattern' => '[a-zA-Z0-9_]+@[a-zA-Z0-9_\.]+',
                'prepend_at' => true
                ])
                {{ Auth::user()->mastodon }}
                @endcomponent
                @component('components.profile_form_row', [
                'name' => 'discord',
                'placeholder' => 'Someone#1234',
                'label' => 'Discord',
                'pattern' => '[^#]{2,32}#\d{4}',
                'prepend_at' => true
                ])
                {{ Auth::user()->discord }}
                @endcomponent
                @component('components.profile_form_row', [
                'name' => 'github',
                'placeholder' => 'someuser',
                'label' => 'Github',
                'pattern' => '([a-zA-Z0-9](?:-?[a-zA-Z0-9]){1,38})',
                'prepend_at' => true
                ])
                {{ Auth::user()->github }}
                @endcomponent
                @component('components.profile_form_row', [
                'type' => 'url',
                'name' => 'youtube',
                'placeholder' => 'https://youtube.com/channel/user-id12345',
                'label' => 'YouTube',
                'pattern' => '((http|https):\/\/|)(www\.|)youtube\.com\/(channel\/|user\/)[a-zA-Z0-9\-]{1,}',
                'prepend_at' => false
                ])
                {{ Auth::user()->youtube }}
                @endcomponent
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
