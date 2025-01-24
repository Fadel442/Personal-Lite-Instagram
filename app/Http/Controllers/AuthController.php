<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
   
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        if ($user) {
            $user->profile()->create([
                'username' => $request->username,
            ]);


            Auth::login($user); 
            return redirect()->intended('/homepage'); 
        }

        return redirect()->back()->with('error', 'User creation failed');
    }

   
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/profile'); 
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

  
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); 
    }
}