@extends('layouts.main')

@section('konten')
    <div class="flex justify-between">
        <div class="w-80 mr-[65px]">
            @include('components.sidebar')
        </div>
        <div class="w-full p-5 pt-10 space-y-6 flex flex-col items-center">
            @foreach ($feeds as $feed)
                @include('components.feed-card', ['feed' => $feed]) 
            @endforeach
        </div>
        <div class="w-80">
           
        </div>
    </div>
@endsection