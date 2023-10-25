<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        return view('profile', [
            "title" => "Profile",
            "user" => $user
        ]);
    }

    public function change_profile(Request $request)
    {
        $user = User::findOrFail($request['user_id']);

        return view('changeprofile', [
            "title" => "Change Profile",
            "user" => $user
        ]);
    }

    public function save_change_profile(Request $request)
    {
        $user = User::findOrFail($request['user_id']);

        $user->username = $request['username'];
        $user->department = $request['department'];
        $user->save();

        return redirect('/profile/' . $user->username);
    }
}
?>