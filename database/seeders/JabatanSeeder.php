<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jabatan;

class JabatanSeeder extends Seeder
{
    public function run(): void
    {
        $jabatan = [
            'Kepala Sekolah',
            'Wakasek Kurikulum',
            'Wakasek Kesiswaan',
            'Wakasek Sarana dan Prasarana',
            'Wakasek Hubungan Masyarakat',
            'Staff Tata Usaha',
            'Kepala Perpustakaan',
            'Kepala Laboratorium',
            'Guru Mata Pelajaran',
            'Guru BK',
            'Wali Kelas',
            'Pembina OSIS',
            'Pembina Ekstrakurikuler',
        ];

        foreach ($jabatan as $nama) {
            Jabatan::firstOrCreate([
                'nama_jabatan' => $nama,
            ]);
        }
    }
}
