<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpkSeeder extends Seeder
{
    public function run(): void
    {
        // Insert Kriteria
        DB::table('kriteria')->insert([
            ['kode' => 'C1', 'nama_kriteria' => 'Harga', 'bobot' => 0.35, 'atribut' => 'cost'],
            ['kode' => 'C2', 'nama_kriteria' => 'Jarak', 'bobot' => 0.25, 'atribut' => 'cost'],
            ['kode' => 'C3', 'nama_kriteria' => 'Fasilitas', 'bobot' => 0.20, 'atribut' => 'benefit'],
            ['kode' => 'C4', 'nama_kriteria' => 'Luas', 'bobot' => 0.20, 'atribut' => 'benefit'],
        ]);

        // Insert Alternatif
        DB::table('alternatif')->insert([
            ['kode'=>'A1','nama_alternatif'=>'Kosan Shenna','harga'=>650000,'jarak'=>2500,'fasilitas'=>'Wifi, Kamar Mandi Dalam, Kasur, Dapur, Tempat Parkir Motor, 1 Kamar, 1 Ruangan','luas'=>'4x7'],
            ['kode'=>'A2','nama_alternatif'=>'Kosan Pink','harga'=>500000,'jarak'=>2000,'fasilitas'=>'Kamar Mandi Dalam, Kasur, Dapur, Tempat Parkir Motor, 1 Kamar, 1 Ruangan','luas'=>'4x6'],
            ['kode'=>'A3','nama_alternatif'=>'Kosan Cepot','harga'=>750000,'jarak'=>1300,'fasilitas'=>'Kamar Mandi Dalam, 1 Kamar, Kasur','luas'=>'3x5'],
            ['kode'=>'A4','nama_alternatif'=>'Kosan Bumi Kembar','harga'=>900000,'jarak'=>1600,'fasilitas'=>'Wifi, Kamar Mandi Dalam, Kasur, Dapur, Tempat Parkir Motor, 2 Kamar, 1 Ruangan, Lemari, AC','luas'=>'5x8'],
            ['kode'=>'A5','nama_alternatif'=>'Kosan Bu Yeti','harga'=>600000,'jarak'=>2000,'fasilitas'=>'Kamar Mandi Dalam, 1 Kamar','luas'=>'3x3'],
        ]);

        // Insert Penilaian (sesuai tabel perancangan)
        DB::table('penilaian')->insert([
            ['alternatif_id'=>1,'kriteria_id'=>1,'nilai'=>3],
            ['alternatif_id'=>1,'kriteria_id'=>2,'nilai'=>2],
            ['alternatif_id'=>1,'kriteria_id'=>3,'nilai'=>4],
            ['alternatif_id'=>1,'kriteria_id'=>4,'nilai'=>4],
            ['alternatif_id'=>2,'kriteria_id'=>1,'nilai'=>5],
            ['alternatif_id'=>2,'kriteria_id'=>2,'nilai'=>3],
            ['alternatif_id'=>2,'kriteria_id'=>3,'nilai'=>3],
            ['alternatif_id'=>2,'kriteria_id'=>4,'nilai'=>3],
            ['alternatif_id'=>3,'kriteria_id'=>1,'nilai'=>3],
            ['alternatif_id'=>3,'kriteria_id'=>2,'nilai'=>4],
            ['alternatif_id'=>3,'kriteria_id'=>3,'nilai'=>2],
            ['alternatif_id'=>3,'kriteria_id'=>4,'nilai'=>2],
            ['alternatif_id'=>4,'kriteria_id'=>1,'nilai'=>2],
            ['alternatif_id'=>4,'kriteria_id'=>2,'nilai'=>3],
            ['alternatif_id'=>4,'kriteria_id'=>3,'nilai'=>5],
            ['alternatif_id'=>4,'kriteria_id'=>4,'nilai'=>5],
            ['alternatif_id'=>5,'kriteria_id'=>1,'nilai'=>4],
            ['alternatif_id'=>5,'kriteria_id'=>2,'nilai'=>3],
            ['alternatif_id'=>5,'kriteria_id'=>3,'nilai'=>1],
            ['alternatif_id'=>5,'kriteria_id'=>4,'nilai'=>1],
        ]);
    }
}
