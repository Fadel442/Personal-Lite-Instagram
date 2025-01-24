<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feeds;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class ArchiveController extends Controller
{
    public function index(Request $request)
    {
        $feeds = Feeds::where('user_id', Auth::id())->latest()->get();

        return view('archives.archive', compact('feeds'));
    }

    public function exportPDF(Request $request)
    {
        $feeds = Feeds::where('user_id', Auth::id())->latest()->get();
        $pdf = Pdf::loadView('archives.pdf', compact('feeds'));

        return $pdf->download('archives.pdf');
    }
}
