@extends('layouts.app')

@if(isset($user))
@section('title', 'Profile: @' . $user->user_name)
@else
@section('title', 'View Profile')
@endif
@section('content')
@php
// If this is the user's own profile, all information is shown, otherwise, only public information.
$personal_profile = Auth::check() && Auth::user()->user_name == $user->user_name;

@endphp
@if(isset($user))
<div class="row">
    <div class="col-2">
        <img src="{{ asset($user->profile_picture) }}" aria-label="Profile picture for {{ $user->full_name }}"
            style="width: 100%;">
    </div>
    <div class="col">
        <h1>{{ __($user->full_name) }}</h1>
        <strong>{{ __('@' . $user->user_name ) }}</strong>
@if($user->type != 'user')
 (<strong>{{ ucfirst($user->type) }}</strong>)
@endif
        <table>
            <tbody>
                @if($user->public_email || $personal_profile)
                <tr>
                    <th>Email Address:</th>
                    <td><a href="mailto:{{ $user->email }}"
                            title="Contact {{ __('@' . $user->user_name) }} via email">{{ $user->email }}</a>
                        {{ $user->public_email? "": "(not shown publicly)" }}
                    </td>
                </tr>
                @endif
                @if($user->twitter)
                <tr>
                    <th>Twitter:</th>
                    <td>
                        <a href="https://twitter.com/{{ $user->twitter }}"
                            target="blank">{{ __('@' . $user->twitter) }}</a>
                    </td>
                </tr>
                @endif
                @if($user->mastodon)
                <tr>
                    <th>Mastodon:</th>
                    <td>
                        @php
                        $mastodon = explode('@', $user->mastodon);
                        @endphp
                        <a href="{{ 'http://' . $mastodon[1] . '/@' . $mastodon[0] }}"
                            target="blank">{{ __('@' . $user->mastodon) }}</a>
                    </td>
                </tr>
                @endif
                @if($user->discord)
                <tr>
                    <th>Discord:</th>
                    <td>
                        {{ __('@' . $user->discord) }}
                    </td>
                </tr>
                @endif
                @if($user->github)
                <tr>
                    <th>Github:</th>
                    <td>
                        <a href="https://github.com/{{ $user->github }}"
                            target="blank">{{ __('@' . $user->github) }}</a>
                    </td>
                </tr>
                @endif
                @if($user->youtube)
                <tr>
                    <th>YouTube:</th>
                    <td>
                        <a href="{{ $user->youtube }}" target="blank">{{ $user->user_name }}'s channel</a>
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    @if($personal_profile)
    <div class="ml-auto mr-1">
        <a href="/edit-profile" class="btn btn-primary" role="button">Edit Profile</a>
    </div>
    @endif
</div>
<hr>
@if($user->bio)
<h2>Bio</h2>
{!! $user->bio !!}
@endif
@else
<p>Something went wrong. Please try again.</p>
@endif
@endsection
