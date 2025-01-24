@extends('layouts.main')

@section('konten')
    <div class="flex justify-between">
        <div class="w-80">
            @include('components.sidebar')
        </div>
        <div class="w-full p-6  mt-2">
            
            <div >
                <h1 class="text-2xl font-bold mb-4">Archive</h1>
                
                {{-- <!-- Filter Tanggal -->
                <form action="{{ route('archive-index') }}" method="GET" class="flex items-center space-x-4 mb-5">
                    <div>
                        <label for="start_date" class="block font-bold">Start Date</label>
                        <input type="date" name="start_date" id="start_date" value="{{ request('start_date') }}" class="border p-2 rounded">
                    </div>
                    <div>
                        <label for="end_date" class="block font-bold">End Date</label>
                        <input type="date" name="end_date" id="end_date" value="{{ request('end_date') }}" class="border p-2 rounded">
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Filter</button>
                </form> --}}
    
            <!-- Tombol Download -->
            <div class="mb-4">
                {{-- <a href="{{ route('archive.exportExcel', request()->all()) }}" class="bg-green-500 text-white px-4 py-2 rounded">Download Excel</a> --}}
                <a href="{{ route('archive.exportPDF', request()->all()) }}" class="bg-red-500 text-white px-4 py-2 rounded">Download PDF</a>
            </div>
            
            <!-- Data Table -->
            <table class="table-auto w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2">Post</th>
                        <th class="border px-4 py-2">Date</th>
                        <th class="border px-4 py-2">Caption</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($feeds as $feed)
                    <tr>
                            <td class="border px-4 py-2 flex justify-center">
                                @if ($feed->file_type === 'image')
                                <img src="{{ $feed->file_path }}" alt="Image" class="w-16 h-16 object-cover">
                                @elseif ($feed->file_type === 'video')
                                <video src="{{ $feed->file_path }}" class="w-16 h-16" controls></video>
                                @endif
                            </td>
                            <td class="border px-4 py-2">{{ $feed->created_at->format('d M Y') }}</td>
                            <td class="border px-4 py-2">{{ $feed->caption }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        @endsection
        