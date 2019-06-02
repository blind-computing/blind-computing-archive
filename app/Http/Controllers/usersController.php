<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class usersController extends Controller
{
    /**
     * Get a particular user's profile.
     * @param string $username
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile(string $username)
    {
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
}
