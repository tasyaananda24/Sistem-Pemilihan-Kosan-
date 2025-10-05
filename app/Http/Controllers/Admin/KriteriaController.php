<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kriteria;

class KriteriaController extends Controller
{
    public function index() {
        $kriteria = Kriteria::all();
        return view('admin.v_kriteria', compact('kriteria'));
    }

    public function create() {
        return view('admin.v_addkriteria');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_kriteria'=>'required|string',
            'bobot'=>'required|numeric',
            'atribut'=>'required|in:cost,benefit',
        ]);

        Kriteria::create($request->all());
        return redirect()->route('admin.kriteria.index')->with('success','Kriteria berhasil ditambah.');
    }

    public function edit(Kriteria $kriteria) {
        return view('admin.v_editkriteria', compact('kriteria'));
    }

    public function update(Request $request, Kriteria $kriteria) {
        $request->validate([
            'nama_kriteria'=>'required|string',
            'bobot'=>'required|numeric',
            'atribut'=>'required|in:cost,benefit',
        ]);

        $kriteria->update($request->all());
        return redirect()->route('admin.kriteria.index')->with('success','Kriteria berhasil diupdate.');
    }

    public function destroy(Kriteria $kriteria) {
        $kriteria->delete();
        return redirect()->route('admin.kriteria.index')->with('success','Kriteria berhasil dihapus.');
    }
}
