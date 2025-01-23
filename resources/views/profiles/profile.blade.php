@extends('layouts.main')

@section('konten')
    <div class="flex justify-between">
        <div class="w-80">
            @include('components.sidebar')
        </div>
        <div class="w-full p-6  mt-2 flex flex-col">
            <div class="flex ml-40">
                <div class="w-40 h-40 bg-gray-400 rounded-full overflow-hidden border-2 flex items-center justify-center">
                    <img src="" alt="cc" class="h-full object-cover">
                </div>
                <div>
                    <div class="flex ml-28">
                        <div>
                            <h2 class="text-xl font-bold mt-3">{{ $user->username }}</h2>
                        </div>
                        <div class="ml-10">
                            <a href="{{ route('profile-edit') }}">
                                <button class="btn w-28 h-7 text-sm text-white font-semibold bg-gray-800 rounded-lg">Edit Profil</button>
                            </a>
                        </div>
                        <div class="ml-5">
                            <button class="btn w-28 h-5 text-sm text-white font-semibold bg-gray-800 rounded-lg">Lihat Arsip</button>
                        </div>
                    </div>
                    <div class="ml-28">
                        <div class="mt-5 mb-2">
                            <h1 class="font-bold text-md">{{$user->name}}</h1>
                        </div>
                        <div class="w-80">
                            <p class="text-justify text-sm">{{$user->bio}}</p>
                        </div>
                        <div class="my-5 flex justify-start">
                            <a href="">
                                <button class="btn w-32 h-10 text-sm text-white font-semibold bg-gray-800 rounded-lg">Buat Postingan</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" border-t border-gray-300 mt-4">
                @include('components.profile-feed', [
                    'feeds' => [
                        'feed1.jpg',
                        'feed2.jpg',
                        'feed3.jpg',
                        'feed1.jpg',
                        'feed2.jpg',
                        'feed3.jpg',
                        'feed1.jpg',
                        'feed2.jpg',
                        'feed3.jpg',
                    ]
                ])
            </div>
        </div>

    </div>
@endsection
