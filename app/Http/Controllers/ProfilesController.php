<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Feeds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilesController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $profileFeed = Feeds::with('user.profile')
            ->where('user_id', $user->id)
            ->latest()->get();

        return view('profiles.profile', compact('user', 'profileFeed'));
    }


    public function login()
    {
        return view('sesi.login');
    }

    public function register()
    {
        return view('sesi.register');
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('profiles.profile-edit', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $profile = $user->profile;

        $request->validate([
            'name' => 'nullable|string|max:20',
            'username' => 'required|string|max:20',
            'bio' => 'nullable|string|max:50',

        ]);


        $profile->name = $request->name;
        $profile->bio = $request->bio;
        $profile->username = $request->username;
        $profile->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }

    public function updateProfileImg(Request $request)
    {
        $user = Auth::user();
        $profile = $user->profile;

        $request->validate([
            'profile_img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('profile_img')) {
            $imageLama = $profile->profile_img;

            if (Storage::exists($imageLama)) {
                Storage::delete($imageLama);
            }

            $image = $request->file('profile_img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $upload_path = 'profile_imgs/';
            $image->move(public_path($upload_path), $imageName);


            $profile->profile_img = $upload_path . $imageName;
        }
        $profile->save();

        return redirect()->route('profile-edit')->with('success', 'Foto profil berhasil diperbarui!');
    }
}
