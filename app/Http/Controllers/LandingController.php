<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KosApproved;

class LandingController extends Controller
{
    /**
     * ===============================
     * HALAMAN UTAMA (BERANDA)
     * ===============================
     */
    public function index(Request $request)
    {
        $koss = KosApproved::all();

        // Optional search lama (tetap dipertahankan)
        if ($request->has('search')) {
            $search = $request->search;
            $koss = KosApproved::where('nama_kosan', 'like', "%{$search}%")
                ->orWhere('fasilitas', 'like', "%{$search}%")
                ->orWhere('alamat_kosan', 'like', "%{$search}%")
                ->get();
        }

        return view('welcome', compact('koss'));
    }

    /**
     * ===============================
     * SEARCH & FILTER (BARU)
     * ===============================
     */
    public function search(Request $request)
    {
        $query = KosApproved::query();

        // 🔍 SEARCH KEYWORD
        if ($request->filled('keyword')) {
            $query->where(function ($q) use ($request) {
                $q->where('nama_kosan', 'like', "%{$request->keyword}%")
                  ->orWhere('fasilitas', 'like', "%{$request->keyword}%")
                  ->orWhere('alamat_kosan', 'like', "%{$request->keyword}%");
            });
        }

        // 🎯 FILTER
        if ($request->filter === 'harga') {
            $query->orderBy('harga_sewa', 'asc');
        } elseif ($request->filter === 'jarak') {
            $query->orderBy('jarak_ke_kampus', 'asc');
        } elseif ($request->filter === 'luas') {
            $query->orderBy('luas_tanah', 'desc');
        }

        $koss = $query->get();

        return view('welcome', compact('koss'));
    }
}
