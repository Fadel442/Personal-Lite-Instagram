@extends('layouts.main')

@section('konten')
    <div class="navbar bg-gray-800 text-white">
        <div class="navbar-start mx-5">
            <a href="{{ url('/') }}" class="btn btn-ghost text-xl font-bold">LightGram</a>
        </div>
    </div>
    <div class="flex justify-center pt-14 ">
        <div class="w-[500px] h-auto pb-5 bg-gray-700 rounded-lg">
            <div class="flex justify-center py-5">
                <h1 class="text-white font-bold text-xl">LightGram</h1>
            </div>
            <div class="px-5 py-2">

             

                <form action="{{ route('login') }}" method="POST"> 
                    @csrf
                    <label for="email" class="text-white font-semibold">Email</label>
                    <input type="email" name="email" id="email" placeholder="dummy@gmail.com" class="input input-bordered w-full my-2" value="{{ old('email') }}">

                    <label for="password" class="text-white font-semibold">Password</label>
                    <input type="password" name="password" id="password" placeholder="password" class="input input-bordered w-full my-2">

                    <a class="flex justify-end underline text-sm text-white hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="">
                        {{ __('Forgot Password?') }} 
                    </a>

                    <div class="flex items-center justify-center mt-10">
                        <button type="submit" class="btn btn-bordered w-[120px] mr-4 ms-4 font-bold">
                            {{ __('Login') }}
                        </button>
                    </div>
                    <a class="flex justify-center items-center mt-2 underline text-sm text-white hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                        {{ __('Dont have account?') }}
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection