<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
        return view('profiles.profile-edit');
    }
}
