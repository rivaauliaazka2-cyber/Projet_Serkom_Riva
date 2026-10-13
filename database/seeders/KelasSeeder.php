<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        $daftarKelas = [
            'X-1', 'X-2', 'X-3',
            'XI-1', 'XI-2', 'XI-3',
            'XII-1', 'XII-2', 'XII-3',
        ];

        foreach ($daftarKelas as $nama) {
            DB::table('kelas')->updateOrInsert(
                ['nama_kelas' => $nama],
                ['updated_at' => now(), 'created_at' => now()]
            );
        }
    }
}
