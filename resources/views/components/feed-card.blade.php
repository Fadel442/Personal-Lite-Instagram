<div class="w-[600px] p-4 bg-white rounded-lg shadow-lg border-2 border-black text-black">
    <div class="flex items-center mb-4">
        <div class="w-10 h-10 bg-gray-400 rounded-full">
            {{--  Tampilkan gambar profil user jika ada --}}
            @if ($feed->user->profile_img)
                <img src="{{ asset('storage/' . $feed->user->profile_img) }}" alt="Profile Image" class="w-full h-full rounded-full object-cover">
            @endif
        </div>
        <h3 class="ml-3 font-bold">{{ $feed->user->username }}</h3> 
    </div>

    <div class="w-full h-[300px] bg-gray-300 rounded mb-4">
        {{--  Tampilkan gambar/video feed  --}}
        @if ($feed->file_type === 'image')
            <img src="{{ asset('storage/' . $feed->file_path) }}" alt="Feed Image" class="w-full h-full rounded object-cover"> 
        @elseif ($feed->file_type === 'video')
            <video src="{{ asset('storage/' . $feed->file_path) }}" controls class="w-full h-full rounded object-cover"></video>
        @endif
    </div>

    <div class="flex justify-between items-center mb-2">
        <div class="flex space-x-4">
            <button class="flex items-center space-x-1">
                <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M3 10a7 7 0 1114 0A7 7 0 013 10zm7-4a1 1 0 00-1 1v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7a1 1 0 00-1-1z" />
                </svg>
            </button>
            <button class="flex items-center space-x-1">
                <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M2.93 4.21a10.46 10.46 0 0113.64 0 10.46 10.46 0 011.17 13.45 10.46 10.46 0 01-1.17 1.17 10.46 10.46 0 01-13.64 0A10.46 10.46 0 011.76 5.38c.39-.46.83-.89 1.17-1.17z" />
                </svg>
            </button>
        </div>
    </div>
    <h3 class="font-bold">{{ $feed->user->username }}</h3> 
    <p class="text-sm">{{ $feed->caption }}</p> 
    <p class="text-sm mt-2">{{ $feed->created_at->format('d F Y') }}</p> 

</div>