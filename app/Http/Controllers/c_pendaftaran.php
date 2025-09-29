<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class c_pendaftaran extends Controller
{
    public function index()
    {
        // Dummy data dulu (nanti bisa diganti model m_pendaftaran::all())
        $data = [
            [
                'id_pendaftaran' => 1,
                'nama_properti' => 'Kos Putri Harmoni',
                'tipe_properti' => 'Kost',
                'penanggung_jawab' => 'Budi Santoso',
                'email' => 'budi@example.com',
                'no_telepon' => '08123456789',
                'alamat' => 'Jl. Melati No. 10, Subang',
                'status' => 'pending',
            ],
            [
                'id_pendaftaran' => 2,
                'nama_properti' => 'Villa Asri',
                'tipe_properti' => 'Villa',
                'penanggung_jawab' => 'Siti Aminah',
                'email' => 'siti@example.com',
                'no_telepon' => '08987654321',
                'alamat' => 'Jl. Mawar No. 15, Bandung',
                'status' => 'approved',
            ],
        ];

        return view('pemilik.v_status_pendaftaran', compact('data'));
    }

    public function create()
    {
        return view('pemilik.v_form_pendaftaran');
    }

    public function status()
    {
        // Untuk sementara, arahkan ke index supaya $data tetap ada
        return $this->index();
    }
}
