@extends('layouts.main')

@section('konten')
    <div class="flex justify-between">
        <div class="w-80">
            @include('components.sidebar')
        </div>
        <div class="w-full p-6  mt-2 flex flex-col">
            <div class="flex ml-40">
                <div class="w-40 h-40 bg-gray-400 rounded-full overflow-hidden border-2 flex items-center justify-center">
                    <img src="{{asset($user->profile->profile_img)}}" alt="cc" class="h-full object-cover">
                </div>
                <div>
                    <div class="flex ml-28">
                        <div>
                            <h2 class="text-xl font-bold mt-3">{{ $user->profile->username }}</h2>
                        </div>
                        <div class="ml-10">
                            <a href="{{ route('profile-edit') }}">
                                <button class="btn w-28 h-7 text-sm text-white font-semibold bg-gray-800 rounded-lg">Edit
                                    Profil</button>
                            </a>
                        </div>
                        <div class="ml-5">
                            <button class="btn w-28 h-5 text-sm text-white font-semibold bg-gray-800 rounded-lg">Lihat
                                Arsip</button>
                        </div>
                    </div>
                    <div class="ml-28">
                        <div class="mt-5 mb-2">
                            <h1 class="font-bold text-md">{{ $user->profile->name }}</h1>
                        </div>
                        <div class="w-80">
                            <p class="text-justify text-sm">{{ $user->profile->bio }}</p>
                        </div>
                        <div class="my-5 flex justify-start">
                            <a href="{{ route('feed-add') }}">
                                <button class="btn w-32 h-10 text-sm text-white font-semibold bg-gray-800 rounded-lg">Buat
                                    Postingan</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-4 mt-6">
                @foreach ($profileFeed as $feed)
                    <button class="btn bg-gray-300 h-32 w-full rounded-lg cursor-pointer" 
                            onclick="document.getElementById('modal-{{ $feed->id }}').showModal()">
                        @if ($feed->file_type === 'image')
                            <img src="{{ $feed->file_path }}" alt="Feed Image" 
                                 class="w-full h-full rounded-lg object-cover">
                        @elseif ($feed->file_type === 'video')
                            <video src="{{ $feed->file_path }}" class="w-full h-full rounded-lg object-cover"></video>
                        @endif
                    </button>
                    <dialog id="modal-{{ $feed->id }}" class="modal ml-20">
                        <div class="modal-box w-[650px] h-[570px] max-h-full max-w-full">
                            @include('components.feed-card', ['feed' => $feed])
                        </div>
                        <form method="dialog" class="modal-backdrop">
                            <button>Close</button>
                        </form>
                    </dialog>
                @endforeach
            </div>
            
            
        </div>

    </div>
@endsection
