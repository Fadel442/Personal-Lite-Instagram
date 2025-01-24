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
                <div class="w-[90px] h-[90px] ml-5 bg-gray-400 rounded-full overflow-hidden flex items-center justify-center">
                    @if ($user->profile->profile_img)
                        <img src="{{ asset($user->profile->profile_img) }}" alt="Profile Image" class="w-full h-full object-cover">
                    @else
                        <img src="{{ asset('default-profile.png') }}" alt="Default Profile Image" class="w-full h-full object-cover">
                    @endif
                </div>
                <div class="flex-1 flex items-center justify-end">
    
                    <button class="btn w-32 h-10 bg-gray-800 rounded-xl text-white" onclick="my_modal_2.showModal()">Ubah Foto</button>
                  
                    <dialog id="my_modal_2" class="modal">
                        <div class="modal-box">
                            <form action="{{ route('profile-image-update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="flex flex-col items-center space-y-4">
                                    <label for="profile_img" class="block text-sm font-medium text-gray-700">Upload Foto Baru</label>
                                    <input type="file" name="profile_img" id="profile_img" class="file-input">
                                    <button type="submit" class="btn bg-blue-600 text-white rounded-lg px-4 py-2">Simpan</button>
                                </div>
                            </form>
                        </div>
                        <form method="dialog" class="modal-backdrop">
                            <button>Close</button>
                        </form>
                    </dialog>
                </div>
            </div>
            
       
            <form action="{{ route('profile-update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div>
                    <div class="grid grid-rows-3 gap-2">
                        <div class="flex flex-col gap-2 w-full">
                            <label for="name" class="font-bold text-xl">Name</label>
                        
                            <input type="text" name="name" id="name" placeholder="Type here"
                                class="input border-2 h-10 pl-2 border-black rounded-lg" value="{{ $user->profile->name }}">
                        </div>
                        <div class="flex flex-col gap-2 w-full">
                            <label for="username" class="font-bold text-xl">Username</label>
                         
                            <input type="text" name="username" id="username" placeholder="Type here"
                                class="input border-2 h-10 pl-2 border-black rounded-lg"
                                value="{{ $user->profile->username }}">
                        </div>
                        <div class="flex flex-col gap-2 w-full">
                            <label for="bio" class="font-bold text-xl">Bio</label>
                        
                            <textarea name="bio" id="bio" class="textarea input border-2 pl-2 border-black rounded-lg"
                                placeholder="Type Here">{{ $user->profile->bio }}</textarea>
                        </div>
                     
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
