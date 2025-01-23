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
                            <h2 class="text-xl font-bold mt-3">{{ $user->profile->username }}</h2>
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
                            <h1 class="font-bold text-md">{{$user->profile->name}}</h1>
                        </div>
                        <div class="w-80">
                            <p class="text-justify text-sm">{{$user->profile->bio}}</p>
                        </div>
                        <div class="my-5 flex justify-start">
                            <a href="{{ route('feed-add') }}">
                                <button class="btn w-32 h-10 text-sm text-white font-semibold bg-gray-800 rounded-lg">Buat Postingan</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-300 mt-4">
                <div class="grid grid-cols-3 gap-4 mt-6">
                    @foreach ($profileFeed as $image) 
                        <button data-modal-target="feed-modal-{{ $loop->index }}" data-modal-toggle="feed-modal-{{ $loop->index }}" class="bg-gray-300 h-32 w-full rounded-lg cursor-pointer" type="button"> 
                            <img src="{{ asset($image) }}" alt="Feed Image" class="w-full h-full rounded-lg object-cover">
                        </button>
    
                        {{-- Modal --}}
                        <div id="feed-modal-{{ $loop->index }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-2xl max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="feed-modal-{{ $loop->index }}">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="p-6">
                                        @php
                                            $feed = $user->feeds()->where('file_path', $image)->first();
                                        @endphp
                                        @if ($feed)
                                            @include('components.feed-card', ['feed' => $feed])
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
@endsection
