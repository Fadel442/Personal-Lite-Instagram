<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feeds;
use Illuminate\Support\Facades\Auth;

class FeedsController extends Controller
{
    public function index(){
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Anda harus login terlebih dahulu!');
        }
        $feeds = Feeds::with('user')->latest()->get(); 
        return view('homepage', compact('feeds')); 
    }

    public function create()
    {
        return view('feeds.feed-add'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'caption' => 'required|string',
            'file' => 'required|file|mimes:jpeg,png,jpg,gif,mp4,mov,avi|max:10240', 
        ]);

        $user = Auth::user();
        $file = $request->file('file');

        if ($file) {
            $fileName = time() . '.' . $file->getClientOriginalExtension();
    
        
            $upload_path = 'feeds-content/'; 
    
         
            $file->move($upload_path, $fileName); 
    
         
            $feed = new Feeds();
            $feed->user_id = $user->id;
            $feed->caption = $request->caption;
            $feed->file_path = $upload_path . $fileName; 
    
          
            if (in_array($file->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'gif'])) {
                $feed->file_type = 'image';
            } elseif (in_array($file->getClientOriginalExtension(), ['mp4', 'mov', 'avi'])) {
                $feed->file_type = 'video';
            }
    
            $feed->save();
        }

        return redirect()->route('homepage')->with('success', 'Feed added successfully!');
    }
}