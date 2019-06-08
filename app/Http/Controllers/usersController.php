<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\User;

class usersController extends Controller
{
    /**
     * Get a particular user's profile.
     * @param string $username
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile(string $username = null)
    {
        // If null, return the currently logged in user.
        if ($username == null && Auth::check()) {
            $username = Auth::user()->user_name;
        }
        // Get the user in question (if they exist).
        $user = User::where('user_name', $username)->take(1)->get();
        if (count($user)) {
            $user = $user[0];
            return View('users.profile', [
                'user' => $user
            ]);
        } else {
            return abort(404);
        }
    }

    /**
     * Show the page for editing your profile.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit_profile()
    {
        if (Auth::check()) {
            return View('users.edit_profile');
        } else {
            return Redirect('/')->with('error', 'You don\'t have permission to access the specified resource.');
        }
    }

    /**
     * Store updated information for a user.
     * @return \Illuminate\Contracts\Support\Renderable     
     */
    public function update_profile()
    {
                // Retrieve the logged in user from the db.
        $user = User::find(Auth::user()->id);
        // Validate the incoming data.
        request()->validate([
'fullname' => ['required', 'string', 'max:255'],
'username' => ['required', 'string', 'max:255'],
'profilepicture' => ['nullable', 'sometimes', 'file', 'image', 'dimensions:max_width=700,max_height=700'],
'email' => ['required', 'email'],
'twitter' => ['nullable', 'sometimes', 'string', 'max:15', 'regex:/[a-zA-Z0-9_]{1,15}/'],
'mastodon' => ['nullable', 'sometimes', 'string', 'regex:/[a-zA-Z0-9_]+@[a-zA-Z0-9_\.]+/'],
'discord' => ['nullable', 'sometimes', 'string', 'max:37', 'regex:/[^#]{2,32}#\d{4}/'],
'github' => ['nullable', 'sometimes', 'string', 'max:38', 'regex:/([a-zA-Z0-9](?:-?[a-zA-Z0-9]){1,38})/'],
'youtube' => ['nullable', 'sometimes', 'url', 'regex:/((http|https):\/\/|)(www\.|)youtube\.com\/(channel\/|user\/)[a-zA-Z0-9\-]{1,}/'],
'bio' => ['nullable', 'sometimes', 'string']
        ]);
        // Upload and sort out the profile picture (if any)
        if(request()->file('profilepicture') != null)
        {
        $profilepicture = '/storage/' . request()->file('profilepicture')->store('profile_pictures', 'public');
        // Delete the old picture if it isn't the default
        if($user->profile_picture != 'images/profile_default.png')
        {
$path = implode('/', array_slice(explode('/', $user->profile_picture), 2));
            Storage::disk('public')->delete($path);
        }
    }
        // Update all of the user's metadata.
        $user->full_name = request('fullname');
        $user->user_name = request('username');
        request()->file('profilepicture') != null && $user->profile_picture = $profilepicture;
        $user->email = request('email');
        $user->public_email = request('publicemail') == "on"? true: false;
        $user->twitter = request('twitter');
        $user->mastodon = request('mastodon');
        $user->discord = request('discord');
        $user->github = request('github');
        $user->youtube = request('youtube');
        $user->bio = request('bio');
        $user->save();
        return Redirect('/profile')->with('success', 'Profile updated successfully');
    }
}
