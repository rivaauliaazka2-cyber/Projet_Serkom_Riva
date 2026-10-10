<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Pengumuman;
use App\Models\Prestasi;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahSiswa = Siswa::count();
        $jumlahGuru = Guru::count();
        $jumlahBerita = Berita::where('status', 'Publish')->count();
        $jumlahGaleri = Galeri::count();

        // Berita terbaru: hanya Publish
        $beritaTerbaru = Berita::where('status', 'Publish')
            ->latest('tanggal')
            ->take(5)
            ->get();

        $galeriTerbaru = Galeri::latest('tanggal')
            ->take(6)
            ->get();

        // Pengumuman terbaru: hanya Publish
        $pengumumanTerbaru = Pengumuman::where('status', 'Publish')
            ->latest('tanggal')
            ->take(5)
            ->get();

        $prestasiTerbaru = Prestasi::latest('tahun_ajaran')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'jumlahSiswa',
            'jumlahGuru',
            'jumlahBerita',
            'jumlahGaleri',
            'beritaTerbaru',
            'galeriTerbaru',
            'pengumumanTerbaru',
            'prestasiTerbaru'
        ));
    }
}
