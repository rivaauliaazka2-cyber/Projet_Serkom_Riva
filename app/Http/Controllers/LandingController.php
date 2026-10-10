<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Prestasi;
use App\Models\Ekstrakurikuler;
use App\Models\ProfilSekolah;
use App\Models\Pengumuman;

class LandingController extends Controller
{
    public function index()
    {
        $jumlahSiswa = Siswa::count();
        $jumlahGuru = Guru::count();
        $jumlahPrestasi = Prestasi::count();
        $jumlahEkskul = Ekstrakurikuler::count();

        $beritaTerbaru = Berita::where('status', 'Publish')
            ->orderBy('tanggal', 'desc')
            ->take(6)
            ->get();

        $prestasiTerbaru = Prestasi::latest()
            ->take(6)
            ->get();

        $ekskul = Ekstrakurikuler::latest()
            ->take(6)
            ->get();

        $guru = Guru::latest()
            ->take(6)
            ->get();

        $galeri = Galeri::latest()
            ->take(6)
            ->get();

        $pengumuman = Pengumuman::where('status', 'Publish')
            ->orderBy('tanggal', 'desc')
            ->take(6)
            ->get();

        $profil = ProfilSekolah::first();

        return view('landing.landingpage', compact(
            'jumlahSiswa',
            'jumlahGuru',
            'jumlahPrestasi',
            'jumlahEkskul',
            'beritaTerbaru',
            'prestasiTerbaru',
            'ekskul',
            'guru',
            'galeri',
            'pengumuman',
            'profil'
        ));
    }
}
