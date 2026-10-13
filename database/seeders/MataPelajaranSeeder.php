<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MataPelajaran;

class MataPelajaranSeeder extends Seeder
{
    public function run(): void
    {
        $mapel = [
            'Pendidikan Agama Islam',
            'PPKn',
            'Bahasa Indonesia',
            'Bahasa Inggris',
            'Matematika',
            'Fisika',
            'Kimia',
            'Biologi',
            'Sejarah',
            'Geografi',
            'Sosiologi',
            'Ekonomi',
            'Informatika',
            'PJOK',
            'Seni Budaya',
            'Bahasa Sunda',
            'Bahasa Jepang',
        ];

        foreach ($mapel as $nama) {
            MataPelajaran::firstOrCreate([
                'nama_mapel' => $nama,
            ]);
        }
    }
}
