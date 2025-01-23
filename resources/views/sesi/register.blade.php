@extends('layouts.main')

@section('konten')
    <div class="navbar bg-gray-800 text-white">
        <div class="navbar-start mx-5">
            <a href="{{ url('/') }}" class="btn btn-ghost text-xl font-bold">LightGram</a>
        </div>
    </div>
    <div class="flex justify-center pt-5 ">
        <div class="w-[500px] h-[500px] bg-gray-700 rounded-lg">
            <div class="flex justify-center py-5">
                <h1 class="text-white font-bold text-xl">LightGram</h1>
            </div>
            <div class="px-5 py-2">

                <form action="{{ route('register') }}" method="POST"> 
                    @csrf 
                    <label for="username" class="text-white font-semibold">Username</label>
                    <input type="text" name="username" id="username" placeholder="username" class="input input-bordered w-full my-2" value="{{ old('username') }}">

                    <label for="email" class="text-white font-semibold">Email</label>
                    <input type="email" name="email" id="email" placeholder="dummy@gmail.com" class="input input-bordered w-full my-2" value="{{ old('email') }}">

                    <label for="password" class="text-white font-semibold">Password</label>
                    <input type="password" name="password" id="password" placeholder="password" class="input input-bordered w-full my-2">

                    <label for="password_confirmation" class="text-white font-semibold">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="konfirmasi password" class="input input-bordered w-full my-2">

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-white hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <button type="submit" class="btn btn-bordered ms-4 font-bold">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection