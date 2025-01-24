@extends('layouts.main')

@section('konten')
    <div class="navbar bg-gray-800 text-white">
        <div class="navbar-start mx-5">
            <a class="btn btn-ghost text-xl font-bold">LightGram</a>
        </div>
        
        <div class="navbar-end mx-5">
            <a href="{{ route ('login') }}" class="mr-5 font-bold hover:underline">Login</a>
            <a href="{{ route ('register') }}" class="btn w-[100px] h-[2px] font-bold">Join Now</a>
        </div>
    </div>

    <div class="flex justify-center flex-col pt-20">
        <div>
            <h1 class="flex justify-center font-bold text-5xl mb-3">LightGram</h1>
            <h1 class="flex justify-center font-bold">Moments define us, connections shape us. Let your story unfold effortlessly.</h1>
            <p class="mx-36 my-2 text-center">"Life moves quickly, but memories last forever. Personal Lite Instagram is your gateway to sharing and preserving those memories without the distractions of traditional social media. Lightweight yet powerful, it’s built for those who value authenticity over extravagance and connection over complexity. Share your world, your way."</p>
        </div>
        <div class="flex justify-between mt-5">
            <a href="{{ route ('login') }}" class="w-full flex justify-end mx-10">
                <button class="btn w-[130px] bg-gray-700 text-white rounded-[15px]">Login</button>
            </a>
            <a href="{{ route ('register') }}" class="w-full flex justify-start mx-10">
                <button class="btn w-[130px] bg-gray-700 text-white rounded-[15px]">Sign Up</button>
            </a>
        </div>
    </div>
@endsection
