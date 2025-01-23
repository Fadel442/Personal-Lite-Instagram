@extends('layouts.main')

@section('konten')
    <div class="flex justify-between">
        <div class="w-80">
            @include('components.sidebar')
        </div>
        <div class="w-[70%] mx-10 p-5 pt-10 space-y-6 ">
            <div>
                <h1 class="font-bold text-2xl">Edit Profil</h1>
            </div>
            <div class="w-full h-[110px] bg-gray-300 rounded-lg border-2 border-black flex items-center px-5">
                <div
                    class="w-[90px] h-[90px] ml-5 bg-gray-400 rounded-full overflow-hidden flex items-center justify-center">
                    <img src="your-image-url.jpg" alt="Your Image" class="w-full h-full object-cover">
                </div>
                <div class="flex-1 flex items-center justify-end">
                    <button class="w-32 h-10 bg-gray-800 rounded-xl text-white">Ubah Foto</button>
                </div>
            </div>
        {{-- Tambahkan form --}}
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <div class="grid grid-rows-3 gap-2">
                    <div class="flex flex-col gap-2 w-full">
                        <label for="name" class="font-bold text-xl">Name</label>
                        {{-- Ubah label menjadi input field --}}
                        <input type="text" name="name" id="name" placeholder="Type here" class="input border-2 h-10 pl-2 border-black rounded-lg" value="{{ $user->profile->name }}">
                    </div>
                    <div class="flex flex-col gap-2 w-full">
                        <label for="username" class="font-bold text-xl">Username</label>
                        {{-- Ubah label menjadi input field --}}
                        <input type="text" name="username" id="username" placeholder="Type here" class="input border-2 h-10 pl-2 border-black rounded-lg" value="{{ $user->profile->username }}">
                    </div>
                    <div class="flex flex-col gap-2 w-full">
                        <label for="bio" class="font-bold text-xl">Bio</label>
                        {{-- Ubah label menjadi input field --}}
                        <textarea name="bio" id="bio" class="textarea input border-2 pl-2 border-black rounded-lg" placeholder="Type Here">{{ $user->profile->bio }}</textarea>
                    </div>
                    {{-- Tambahkan input field untuk gambar --}}
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="w-32 h-10 mt-5 bg-gray-800 rounded-xl text-white">Simpan</button>
                </div>
            </div>
        </form>
        </div>
        <div class="w-80 pt-10 space-y-6 border-l-2 border-gray-300">
            {{-- <div class="mx-5">
                <h1 >Feed Setting</h1>
            </div> --}}
        </div>
    </div>
@endsection
