<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kriteria;

class KriteriaController extends Controller
{
    public function index() {
        $kriteria = Kriteria::all();
        $totalBobot = $kriteria->sum('bobot');

        return view('admin.v_kriteria', compact('kriteria', 'totalBobot'));
    }

    public function create() {
        $totalBobot = Kriteria::sum('bobot');

        if ($totalBobot >= 1) {
            return redirect()->route('admin.kriteria.index')
                ->with('error', "Total bobot kriteria sudah 100% (" . ($totalBobot*100) . "%), tidak bisa menambah kriteria lagi.");
        }

        $sisaBobot = 1 - $totalBobot;
        return view('admin.v_addkriteria', compact('sisaBobot'));
    } 

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

        // ubah bobot ke desimal jika > 1 (misal 20%)
        if ($data['bobot'] > 1) {
            $data['bobot'] = $data['bobot'] / 100;
        }

        $totalBobot = Kriteria::sum('bobot');
        $sisaBobot = 1 - $totalBobot;

        // total sudah penuh
        if ($totalBobot >= 1) {
            return redirect()->route('admin.kriteria.index')
                ->with('error', "Total bobot kriteria sudah 100% (" . ($totalBobot*100) . "%), tidak bisa menambah kriteria lagi.");
        }

        // bobot baru melebihi sisa
        if ($totalBobot + $data['bobot'] > 1) {
            return redirect()->back()
                ->withInput()
                ->with('error', "Bobot yang dimasukkan terlalu besar. Total bobot saat ini: " . ($totalBobot*100) . "%, sisa bobot yang bisa ditambahkan: " . ($sisaBobot*100) . "%.");
        }

        Kriteria::create($data);

        return redirect()->route('admin.kriteria.index')->with('success', 'Kriteria berhasil ditambah.');
    }

    public function edit(Kriteria $kriteria) {
        $totalBobot = Kriteria::where('id', '!=', $kriteria->id)->sum('bobot');
        $sisaBobot = 1 - $totalBobot;

        return view('admin.v_editkriteria', compact('kriteria', 'sisaBobot'));
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

        $totalBobot = Kriteria::where('id', '!=', $kriteria->id)->sum('bobot');
        $sisaBobot = 1 - $totalBobot;

        if ($totalBobot + $data['bobot'] > 1) {
            return redirect()->back()
                ->withInput()
                ->with('error', "Bobot yang dimasukkan terlalu besar. Total bobot saat ini: " . ($totalBobot*100) . "%, sisa bobot yang bisa ditambahkan: " . ($sisaBobot*100) . "%.");
        }

        $kriteria->update($data);

        return redirect()->route('admin.kriteria.index')->with('success', 'Kriteria berhasil diupdate.');
    }

    public function destroy(Kriteria $kriteria) {
        $kriteria->delete();
        return redirect()->route('admin.kriteria.index')->with('success', 'Kriteria berhasil dihapus.');
    }
}
