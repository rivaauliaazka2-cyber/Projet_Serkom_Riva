@extends('layouts.admin')

@php
    use Illuminate\Support\Facades\Auth;
    use Carbon\Carbon;
    use Illuminate\Support\Str;
@endphp

@section('content')

<div class="container-fluid">

    {{-- JUDUL DASHBOARD --}}
    <div class="mb-4">
        <h2 class="fw-bold text-primary">
            SMA NEGERI 5 TASIKMALAYA
        </h2>
        <p class="text-muted">
            Selamat datang di Sistem Informasi Profil Sekolah
        </p>
    </div>

    {{-- SELAMAT DATANG --}}
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="fw-bold text-primary">
                        Selamat Datang, {{ Auth::user()->name }}
                    </h3>
                    <p class="text-muted mb-0">
                        Anda berhasil login ke Sistem Informasi Profil Sekolah.
                    </p>
                </div>

                <div>
                    <i class="bi bi-person-circle text-primary"
                       style="font-size: 70px;"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- SAMBUTAN KEPALA SEKOLAH --}}
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body p-4">

            <div class="d-flex align-items-center mb-4">
                <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3"
                     style="width: 55px; height: 55px; flex-shrink: 0;">
                    <i class="bi bi-mortarboard-fill text-primary fs-3"></i>
                </div>

                <div>
                    <h5 class="fw-bold text-primary mb-1">
                        Sambutan Kepala Sekolah
                    </h5>
                    <p class="text-muted mb-0">
                        SMA Negeri 5 Tasikmalaya
                    </p>
                </div>
            </div>

            <div class="row align-items-center">

                {{-- ISI SAMBUTAN --}}
                <div class="col-lg-8 col-md-7 order-2 order-md-1">
                    <div class="p-3 rounded"
                         style="background-color: #f5f9ff; border-left: 4px solid #0066a1;">

                        <p class="mb-3" style="line-height: 1.8;">
                            Assalamu'alaikum warahmatullahi wabarakatuh.
                        </p>

                        <p class="text-muted mb-3"
                           style="line-height: 1.8; text-align: justify;">
                            Puji syukur kita panjatkan ke hadirat Allah SWT atas
                            segala rahmat dan karunia-Nya. Selamat datang di
                            Sistem Informasi Profil SMA Negeri 5 Tasikmalaya.
                            Semoga sistem informasi ini dapat menjadi sarana
                            untuk mengenal lingkungan sekolah, memperoleh
                            informasi pendidikan, serta mengetahui berbagai
                            kegiatan dan prestasi warga sekolah.
                        </p>

                        <p class="text-muted mb-3"
                           style="line-height: 1.8; text-align: justify;">
                            Mari bersama-sama mewujudkan lingkungan pendidikan
                            yang berkualitas, berkarakter, dan berprestasi.
                            Semoga seluruh warga sekolah senantiasa semangat
                            dalam belajar, berkarya, dan mengembangkan potensi
                            diri demi masa depan yang lebih baik.
                        </p>

                        <p class="mb-3" style="line-height: 1.8;">
                            Wassalamu'alaikum warahmatullahi wabarakatuh.
                        </p>

                        <div class="border-top pt-3">
                            <small class="text-muted d-block">
                                Hormat saya,
                            </small>

                            <h6 class="fw-bold text-primary mt-1 mb-1">
                                Kepala SMA Negeri 5 Tasikmalaya
                            </h6>

                            <small class="text-muted">
                                Kepala Sekolah
                            </small>
                        </div>
                    </div>
                </div>

                {{-- FOTO KEPALA SEKOLAH --}}
                <div class="col-lg-4 col-md-5 order-1 order-md-2 mb-4 mb-md-0">
                    <div class="text-center">

                        <div class="d-inline-block p-2 rounded-4 shadow-sm"
                             style="background-color: #eaf6ff;">

                            <img
                                src="{{ asset('uploads/profil/1791513278_foto.jpg') }}"
                                alt="Foto Kepala Sekolah"
                                class="img-fluid rounded-3"
                                style="width: 100%; max-width: 260px; height: 320px; object-fit: cover;"
                                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                            >

                            <div class="align-items-center justify-content-center rounded-3"
                                 style="display: none; width: 240px; height: 320px; background-color: #dceeff;">
                                <div class="text-center text-primary">
                                    <i class="bi bi-person-badge fs-1"></i>
                                    <p class="mb-0 mt-2 small">
                                        Foto Kepala Sekolah
                                    </p>
                                </div>
                            </div>

                        </div>

                        <h6 class="fw-bold text-primary mt-3 mb-1">
                            Kepala Sekolah
                        </h6>

                        <p class="text-muted small mb-0">
                            SMA Negeri 5 Tasikmalaya
                        </p>

                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- STATISTIK --}}
    <div class="row">

        {{-- JUMLAH SISWA --}}
        <div class="col-md-3 col-6 mb-4">
            <a href="{{ route('siswa.index') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-people-fill text-primary fs-1"></i>
                        <h2 class="fw-bold mt-2 text-dark">
                            {{ $jumlahSiswa }}
                        </h2>
                        <p class="text-muted mb-0">Jumlah Siswa</p>
                    </div>
                </div>
            </a>
        </div>

        {{-- JUMLAH GURU --}}
        <div class="col-md-3 col-6 mb-4">
            <a href="{{ route('guru.index') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-person-workspace text-primary fs-1"></i>
                        <h2 class="fw-bold mt-2 text-dark">
                            {{ $jumlahGuru }}
                        </h2>
                        <p class="text-muted mb-0">Jumlah Guru</p>
                    </div>
                </div>
            </a>
        </div>

        {{-- JUMLAH BERITA PUBLISH --}}
        <div class="col-md-3 col-6 mb-4">
            <a href="{{ route('berita.index') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-newspaper text-primary fs-1"></i>
                        <h2 class="fw-bold mt-2 text-dark">
                            {{ $jumlahBerita }}
                        </h2>
                        <p class="text-muted mb-0">Jumlah Berita Publish</p>
                    </div>
                </div>
            </a>
        </div>

        {{-- JUMLAH GALERI --}}
        <div class="col-md-3 col-6 mb-4">
            <a href="{{ route('galeri.index') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-images text-primary fs-1"></i>
                        <h2 class="fw-bold mt-2 text-dark">
                            {{ $jumlahGaleri }}
                        </h2>
                        <p class="text-muted mb-0">Jumlah Galeri</p>
                    </div>
                </div>
            </a>
        </div>

    </div>

    {{-- BERITA DAN PENGUMUMAN --}}
    <div class="row">

        {{-- BERITA TERBARU --}}
        <div class="col-lg-6 mb-4">
            <div class="card border-0 shadow-sm h-100">

                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0">
                        <i class="bi bi-newspaper me-2"></i>
                        Berita Terbaru
                    </h5>
                </div>

                <div class="card-body">

                    @forelse($beritaTerbaru as $berita)

                        <div class="mb-3 border-bottom pb-3">
                            <h6 class="fw-bold mb-2">
                                {{ $berita->judul }}
                            </h6>

                            <small class="text-muted">
                                <i class="bi bi-calendar-event me-1"></i>
                                {{ Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}
                            </small>
                        </div>

                    @empty
                        <p class="text-muted mb-0">
                            Belum ada berita yang dipublish.
                        </p>
                    @endforelse

                </div>
            </div>
        </div>

        {{-- PENGUMUMAN TERBARU --}}
        <div class="col-lg-6 mb-4">
            <div class="card border-0 shadow-sm h-100">

                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0">
                        <i class="bi bi-megaphone-fill me-2"></i>
                        Pengumuman Terbaru
                    </h5>
                </div>

                <div class="card-body">

                    @forelse($pengumumanTerbaru as $pengumuman)

                        <div class="mb-3 border-bottom pb-3">
                            <h6 class="fw-bold mb-2">
                                {{ $pengumuman->judul }}
                            </h6>

                            <p class="text-muted mb-2">
                                {{ Str::limit($pengumuman->isi, 100) }}
                            </p>

                            <small class="text-muted">
                                <i class="bi bi-calendar-event me-1"></i>
                                {{ Carbon::parse($pengumuman->tanggal)->translatedFormat('d F Y') }}
                            </small>
                        </div>

                    @empty
                        <p class="text-muted mb-0">
                            Belum ada pengumuman yang dipublish.
                        </p>
                    @endforelse

                </div>
            </div>
        </div>

    </div>

    {{-- PRESTASI DAN AKTIVITAS SISWA --}}
    <div class="row">

        {{-- PRESTASI TERBARU --}}
        <div class="col-lg-6 mb-4">
            <div class="card border-0 shadow-sm h-100">

                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0">
                        <i class="bi bi-trophy-fill me-2"></i>
                        Prestasi Terbaru
                    </h5>
                </div>

                <div class="card-body">

                    @forelse($prestasiTerbaru as $prestasi)

                        <div class="d-flex align-items-start mb-3 border-bottom pb-3">

                            @if($prestasi->foto)
                                <img
                                    src="{{ asset('uploads/prestasi/'.$prestasi->foto) }}"
                                    alt="{{ $prestasi->nama_prestasi }}"
                                    class="rounded me-3"
                                    style="width: 90px; height: 80px; object-fit: cover; flex-shrink: 0;"
                                >
                            @else
                                <div class="rounded bg-light me-3 d-flex align-items-center justify-content-center"
                                     style="width: 90px; height: 80px; flex-shrink: 0;">
                                    <i class="bi bi-trophy text-primary fs-2"></i>
                                </div>
                            @endif

                            <div>
                                <h6 class="fw-bold mb-1">
                                    {{ $prestasi->nama_prestasi }}
                                </h6>

                                <p class="text-muted mb-2">
                                    {{ Str::limit($prestasi->deskripsi, 90) }}
                                </p>

                                <small class="text-muted">
                                    <i class="bi bi-calendar-event me-1"></i>
                                    Tahun ajaran: {{ $prestasi->tahun_ajaran }}
                                </small>
                            </div>

                        </div>

                    @empty
                        <p class="text-muted mb-0">
                            Belum ada prestasi.
                        </p>
                    @endforelse

                </div>
            </div>
        </div>

        {{-- AKTIVITAS SISWA --}}
        <div class="col-lg-6 mb-4">
            <div class="card border-0 shadow-sm h-100">

                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0">
                        <i class="bi bi-images me-2"></i>
                        Aktivitas Siswa
                    </h5>
                </div>

                <div class="card-body">
                    <div class="row">

                        @forelse($galeriTerbaru as $galeri)

                            <div class="col-md-6 col-sm-6 mb-3">
                                <div class="card border-0 shadow-sm h-100">

                                    <img
                                        src="{{ asset('uploads/galeri/'.$galeri->file) }}"
                                        alt="{{ $galeri->judul }}"
                                        class="card-img-top"
                                        style="height: 160px; object-fit: cover;"
                                        loading="lazy"
                                    >

                                    <div class="card-body">
                                        <h6 class="fw-bold mb-2">
                                            {{ $galeri->judul }}
                                        </h6>

                                        <small class="text-muted">
                                            <i class="bi bi-calendar-event me-1"></i>
                                            {{ Carbon::parse($galeri->tanggal)->translatedFormat('d F Y') }}
                                        </small>
                                    </div>

                                </div>
                            </div>

                        @empty
                            <div class="col-12">
                                <p class="text-muted mb-0">
                                    Belum ada aktivitas siswa.
                                </p>
                            </div>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection
