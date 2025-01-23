<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feeds; // Import model Feeds

class FeedsController extends Controller
{
    public function index(){
        $feeds = Feeds::with('user')->latest()->get(); // Ambil data feeds beserta user-nya
        return view('homepage', compact('feeds')); // Kirim data feeds ke view
    }
}