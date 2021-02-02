<?php

namespace App\Http\Controllers;

use App\Followable;
use App\User;

use Illuminate\Http\Request;

class FollowsController extends Controller
{
    use Followable;
    public function store(User $user)
    {

        auth()->user()->follow($user);
        return view('profiles.show');

    }
    public function destroy(User $user )
    {

        auth()->user()->unfollow($user);
        return view('profiles.show');

    }
}
