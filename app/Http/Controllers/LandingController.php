<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KosApproved;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua kosan approved
        $koss = KosApproved::all();

        // Optional: filter pencarian
        if ($request->has('search')) {
            $search = $request->search;
            $koss = KosApproved::where('nama_kosan', 'like', "%{$search}%")
                        ->orWhere('fasilitas', 'like', "%{$search}%")
                        ->get();
        }

        return view('welcome', compact('koss'));
    }
}
