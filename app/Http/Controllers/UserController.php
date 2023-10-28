<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function follow(User $user)
    {
        auth()->user()->following()->attach($user);
        return back();
    }

    public function unfollow(User $user)
    {
        auth()->user()->following()->detach($user);
        return back();
    }

    public function followers(User $user)
    {
        $followers = $user->followers;
        return view('users.followers', compact('user', 'followers'));
    }

}
