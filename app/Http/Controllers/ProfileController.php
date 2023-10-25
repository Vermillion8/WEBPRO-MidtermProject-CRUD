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

        if ($request->hasFile('profile_photo')) {
          $profile_photo = $request->file('profile_photo');
          $filename = time() . '.' . $profile_photo->getClientOriginalExtension();
          $profile_photo->storeAs('public/profile_photos', $filename);
          $user->profile_photo_path = 'storage/profile_photos/' . $filename;
      }
      
        $user->save();

        return redirect('/profile/' . $user->username);
    }
    
}
