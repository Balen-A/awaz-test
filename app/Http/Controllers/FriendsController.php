<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class FriendsController extends Controller
{
    public function index()
    {
        return view('profiles.show');
    }
    public function show(Request $req)
    {
        $id = $req->id;

       $user = User::where('id',$id)->first();
        // var_dump($req->id);
        return view('profiles.userProfile', compact('user'));
    }
}
