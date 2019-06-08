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
}
