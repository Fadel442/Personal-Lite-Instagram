<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feeds; // Import model Feeds
use Illuminate\Support\Facades\Auth;

class FeedsController extends Controller
{
    public function index(){
        $feeds = Feeds::with('user')->latest()->get(); // Ambil data feeds beserta user-nya
        return view('homepage', compact('feeds')); // Kirim data feeds ke view
    }

    public function create()
    {
        return view('feeds.feed-add'); // Tampilkan view untuk form tambah feed
    }

    public function store(Request $request)
    {
        $request->validate([
            'caption' => 'required|string',
            'file' => 'required|file|mimes:jpeg,png,jpg,gif,mp4,mov,avi|max:10240', // Validasi file
        ]);

        $user = Auth::user();
        $file = $request->file('file');

        if ($file) {
            // Buat nama file unik dengan ekstensi asli
            $fileName = time() . '.' . $file->getClientOriginalExtension();
    
            // Tentukan path penyimpanan
            $upload_path = 'feeds-content/'; 
    
            // Pindahkan file ke path penyimpanan
            $file->move($upload_path, $fileName); 
    
            // Simpan informasi feed ke dalam database
            $feed = new Feeds();
            $feed->user_id = $user->id;
            $feed->caption = $request->caption;
            $feed->file_path = $upload_path . $fileName; 
    
            // Tentukan file type
            if (in_array($file->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'gif'])) {
                $feed->file_type = 'image';
            } elseif (in_array($file->getClientOriginalExtension(), ['mp4', 'mov', 'avi'])) {
                $feed->file_type = 'video';
            }
    
            $feed->save();
        }

        return redirect()->route('profile')->with('success', 'Feed added successfully!');
    }
}