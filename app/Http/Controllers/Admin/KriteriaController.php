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

    // NOTE: update bobot disesuaikan persen

    public function store(Request $request) {
        $request->validate([
            'kode' => 'required|string|unique:kriteria,kode',
            'nama_kriteria' => 'required|string',
            'bobot' => 'required|numeric',
            'atribut' => 'required|in:cost,benefit',
        ], [
            'kode.required' => 'Kode kriteria wajib diisi.',
            'kode.unique' => 'Kode kriteria sudah digunakan.',
            'nama_kriteria.required' => 'Nama kriteria wajib diisi.',
            'bobot.required' => 'Bobot wajib diisi.',
            'bobot.numeric' => 'Bobot harus berupa angka (contoh: 20 atau 0.2).',
            'atribut.required' => 'Atribut wajib dipilih.',
        ]);

        $data = $request->all();

        // jika bobot > 1 berarti diinput persen → ubah ke desimal
        if ($data['bobot'] > 1) {
            $data['bobot'] = $data['bobot'] / 100;
        }

        Kriteria::create($data);

        return redirect()->route('admin.kriteria.index')->with('success', 'Kriteria berhasil ditambah.');
    }

    public function edit(Kriteria $kriteria) {
        return view('admin.v_editkriteria', compact('kriteria'));
    }

    public function update(Request $request, Kriteria $kriteria) {
        $request->validate([
            'kode' => 'required|string|unique:kriteria,kode,' . $kriteria->id,
            'nama_kriteria' => 'required|string',
            'bobot' => 'required|numeric',
            'atribut' => 'required|in:cost,benefit',
        ], [
            'kode.required' => 'Kode kriteria wajib diisi.',
            'kode.unique' => 'Kode kriteria sudah digunakan.',
            'nama_kriteria.required' => 'Nama kriteria wajib diisi.',
            'bobot.required' => 'Bobot wajib diisi.',
            'bobot.numeric' => 'Bobot harus berupa angka (contoh: 20 atau 0.2).',
            'atribut.required' => 'Atribut wajib dipilih.',
        ]);

        $data = $request->all();

        if ($data['bobot'] > 1) {
            $data['bobot'] = $data['bobot'] / 100;
        }

        $kriteria->update($data);

        return redirect()->route('admin.kriteria.index')->with('success', 'Kriteria berhasil diupdate.');
    }

    public function destroy(Kriteria $kriteria) {
        $kriteria->delete();
        return redirect()->route('admin.kriteria.index')->with('success', 'Kriteria berhasil dihapus.');
    }
}
