<?php

namespace App\Http\Controllers;

use App\Models\Feeds;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Ambil data user yang sedang login
        return view('profiles.profile', compact('user')); 
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
        $user = Auth::user(); // Ambil data user yang sedang login
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
            'profile_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('profile_img')) {
            // Hapus gambar lama jika ada
            if ($profile->profile_img) {
                Storage::disk('public')->delete($profile->profile_img);
            }
            $imagePath = $request->file('profile_img')->store('profile_imgs', 'public');
            $profile->profile_img = $imagePath;
        }
        $profile->name = $request->name;
        $profile->bio = $request->bio;
        $profile->username = $request->username;
        $profile->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'caption' => 'required|string',
            'file' => 'required|file|mimes:jpeg,png,jpg,gif,mp4,mov,avi|max:10240', // Validasi file
        ]);

        $user = Auth::user();
        $feed = new Feeds();
        $feed->user_id = $user->id; 
        $feed->caption = $request->caption;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('feeds', 'public'); // Simpan file di folder 'feeds'
            $feed->file_path = $filePath;

            // Tentukan file type
            if (in_array($file->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'gif'])) {
                $feed->file_type = 'image';
            } elseif (in_array($file->getClientOriginalExtension(), ['mp4', 'mov', 'avi'])) {
                $feed->file_type = 'video';
            }
        }

        $feed->save();

        return redirect()->route('homepage')->with('success', 'Feed added successfully!');
    }
}
