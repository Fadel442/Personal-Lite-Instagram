@extends('layouts.main')

@section('konten')
<div class="flex justify-between">
    <div class="w-80 mr-[65px]">
        @include('components.sidebar')
    </div>
    <div class="w-full p-5 pt-10 space-y-6 flex flex-col items-center">
        <div class="w-[600px] p-4 bg-white rounded-lg shadow-lg border-2 border-black text-black">
            <h1 class="text-2xl font-bold mb-4">Create New Feed</h1>

            @if ($errors->any())
                <div class="alert alert-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('feed.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="file" class="block text-gray-700 text-sm font-bold mb-2">Upload File (Image/Video):</label>
                    <input type="file" name="file" id="file" class="form-input">
                </div>

                <div class="mb-4">
                    <label for="caption" class="block text-gray-700 text-sm font-bold mb-2">Caption:</label>
                    <textarea name="caption" id="caption" class="form-textarea"></textarea>
                </div>

                <button type="submit" class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Create Feed
                </button>
            </form>
        </div>
    </div>
    <div class="w-80">
        <div class="fixed">dsdsd</div>
    </div>
</div>
@endsection