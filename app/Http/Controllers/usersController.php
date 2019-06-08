<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        // Upload and sort out the profile picture (if any)
        $profilepicture_url = asset('/storage/' . request()->file('profilepicture')->store('profile_pictures', 'public'));
        // Update all of the user's metadata.
        $user->full_name = request('fullname');
        $user->user_name = request('username');
        $user->profile_picture = $profilepicture_url;
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
