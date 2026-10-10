<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\ProfilSekolahController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\DashboardController;

use App\Models\ProfilSekolah;
use App\Models\Berita;
use App\Models\Ekstrakurikuler;
use App\Models\Guru;
use App\Models\Prestasi;
use App\Models\Galeri;
use App\Models\Pengumuman;


Route::get('/', [LandingController::class, 'index'])
    ->name('landing');


/*
|--------------------------------------------------------------------------
| TENTANG SEKOLAH
|--------------------------------------------------------------------------
*/

Route::get('/tentang', function () {
    $profil = ProfilSekolah::first();

    return view('landing.tentang', compact('profil'));
})->name('landing.tentang');


/*
|--------------------------------------------------------------------------
| HALAMAN PUBLIK: BERITA
|--------------------------------------------------------------------------
*/

Route::get('/daftar-berita', function () {
    $berita = Berita::where('status', 'Publish')
        ->orderByDesc('tanggal')
        ->get();

    return view('landing.daftar_berita', compact('berita'));
})->name('landing.daftar.berita');

Route::get('/detail-berita/{slug}', function ($slug) {
    $berita = Berita::where('status', 'Publish')
        ->where('slug', $slug)
        ->firstOrFail();

    return view('landing.berita_detail', compact('berita'));
})->name('landing.berita.detail');


/*
|--------------------------------------------------------------------------
| HALAMAN PUBLIK: PRESTASI
|--------------------------------------------------------------------------
*/

Route::get('/daftar-prestasi', function () {
    $prestasi = Prestasi::latest()->get();

    return view('landing.daftar_prestasi', compact('prestasi'));
})->name('landing.daftar.prestasi');

Route::get('/detail-prestasi/{slug}', function ($slug) {
    $prestasi = Prestasi::where('slug', $slug)
        ->firstOrFail();

    return view('landing.prestasi_detail', compact('prestasi'));
})->name('landing.prestasi.detail');


/*
|--------------------------------------------------------------------------
| HALAMAN PUBLIK: GALERI
|--------------------------------------------------------------------------
*/

Route::get('/daftar-galeri', function () {
    $galeri = Galeri::latest()->get();

    return view('landing.daftar_galeri', compact('galeri'));
})->name('landing.daftar.galeri');

Route::get('/detail-galeri/{id_galeri}', function ($id_galeri) {
    $galeri = Galeri::where('id_galeri', $id_galeri)
        ->firstOrFail();

    return view('landing.galeri_detail', compact('galeri'));
})->name('landing.galeri.detail');


/*
|--------------------------------------------------------------------------
| HALAMAN PUBLIK: PENGUMUMAN
|--------------------------------------------------------------------------
*/

Route::get('/daftar-pengumuman', function () {
    $pengumuman = Pengumuman::where('status', 'Publish')
        ->latest('tanggal')
        ->get();

    return view('landing.daftar_pengumuman', compact('pengumuman'));
})->name('landing.daftar.pengumuman');

Route::get('/detail-pengumuman/{id_pengumuman}', function ($id_pengumuman) {
    $pengumuman = Pengumuman::where('status', 'Publish')
        ->where('id_pengumuman', $id_pengumuman)
        ->firstOrFail();

    return view('landing.pengumuman_detail', compact('pengumuman'));
})->name('landing.pengumuman.detail');


/*
|--------------------------------------------------------------------------
| HALAMAN PUBLIK: EKSTRAKURIKULER
|--------------------------------------------------------------------------
*/

Route::get('/daftar-ekskul', function () {
    $ekskul = Ekstrakurikuler::latest()->get();

    return view('landing.daftar_ekskul', compact('ekskul'));
})->name('landing.ekskul');

Route::get('/detail-ekskul/{id_ekskul}', function ($id_ekskul) {
    $ekskul = Ekstrakurikuler::where('id_ekskul', $id_ekskul)
        ->firstOrFail();

    return view('landing.ekskul_detail', compact('ekskul'));
})->name('landing.ekskul.detail');


/*
|--------------------------------------------------------------------------
| HALAMAN PUBLIK: GURU
|--------------------------------------------------------------------------
*/

Route::get('/daftar-guru', function () {
    $guru = Guru::orderBy('nama_guru', 'asc')->get();

    return view('landing.daftar_guru', compact('guru'));
})->name('landing.daftar.guru');

Route::get('/detail-guru/{id_guru}', function ($id_guru) {
    $guru = Guru::where('id_guru', $id_guru)
        ->firstOrFail();

    return view('landing.guru_detail', compact('guru'));
})->name('landing.guru.detail');


/*
|--------------------------------------------------------------------------
| LOGIN DAN LOGOUT
|--------------------------------------------------------------------------
*/

// Menampilkan halaman login
Route::get('/login', [AuthController::class, 'index'])
    ->middleware('guest')
    ->name('login');

// Memproses login
Route::post('/login', [AuthController::class, 'auth'])
    ->middleware('guest')
    ->name('auth');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');




    Route::get('/berita', [BeritaController::class, 'index'])
        ->name('berita.index');

    Route::get('/galeri', [GaleriController::class, 'index'])
        ->name('galeri.index');

    Route::get('/prestasi', [PrestasiController::class, 'index'])
        ->name('prestasi.index');

    Route::get('/siswa', [SiswaController::class, 'index'])
        ->name('siswa.index');

    Route::get('/pengumuman', [PengumumanController::class, 'index'])
        ->name('pengumuman.index');

    Route::get('/ekskul', [EkskulController::class, 'index'])
        ->name('ekskul.index');

    Route::get('/guru', [GuruController::class, 'index'])
        ->name('guru.index');

    Route::get('/profil', [ProfilSekolahController::class, 'index'])
        ->name('profil.index');



    Route::middleware('role:Admin')->group(function () {

        Route::resource('berita', BeritaController::class)
            ->names('berita')
            ->except(['index', 'show']);

        Route::resource('galeri', GaleriController::class)
            ->names('galeri')
            ->except(['index', 'show']);

        Route::resource('prestasi', PrestasiController::class)
            ->names('prestasi')
            ->except(['index', 'show']);

        Route::resource('siswa', SiswaController::class)
            ->names('siswa')
            ->except(['index', 'show']);

        Route::resource('pengumuman', PengumumanController::class)
            ->names('pengumuman')
            ->except(['index', 'show']);

        Route::resource('ekskul', EkskulController::class)
            ->names('ekskul')
            ->except(['index', 'show']);

        Route::resource('guru', GuruController::class)
            ->names('guru')
            ->except(['index', 'show']);

        Route::resource('profil', ProfilSekolahController::class)
            ->names('profil')
            ->except(['index', 'show']);

        Route::resource('user', UserController::class)
            ->names('user')
            ->except(['show']);
    });

});
