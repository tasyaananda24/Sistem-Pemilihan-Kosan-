<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kos;
use App\Models\Kriteria;
use App\Models\Penilaian;

class PenilaianController extends Controller
{
    public function create() {
        $kos = Kos::where('status','approved')->get();
        $kriteria = Kriteria::all();
        return view('admin.spk.v_penilaian', compact('kos','kriteria'));
    }

    public function store(Request $request) {
        foreach($request->nilai as $kos_id => $kriteria_nilai) {
            foreach($kriteria_nilai as $krit_id => $value) {
                \App\Models\Penilaian::updateOrCreate(
                    ['alternatif_id'=>$kos_id, 'kriteria_id'=>$krit_id],
                    ['nilai'=>$value]
                );
            }
        }
        return redirect()->route('admin.penilaian.create')->with('success','Penilaian tersimpan.');
    }
}
