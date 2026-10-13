@extends('layouts.landing')

@section('title', 'Beranda - SMA Negeri 5 Tasikmalaya')

@section('content')

{{-- ================= HERO ================= --}}
<section class="hero" id="beranda">
    <div class="container">
        <div class="hero-content">

            <div class="hero-badge">
                <i class="bi bi-mortarboard-fill me-1"></i>
                WEBSITE RESMI SEKOLAH
            </div>

            <h1>
                SMA NEGERI 5
                <span>TASIKMALAYA</span>
            </h1>

            <p class="mt-4">
                Selamat datang di website resmi SMA Negeri 5 Tasikmalaya.
                Temukan informasi sekolah, berita, prestasi, kegiatan,
                dan berbagai informasi pendidikan lainnya.
            </p>
        </div>
    </div>
</section>

{{-- ================= STATISTIK ================= --}}
<section class="stats py-5">
    <div class="container">
        <div class="row text-center g-4">

            <div class="col-6 col-lg-3">
                <div class="stat-item">
                    <i class="bi bi-people-fill"></i>
                    <div class="stat-number">{{ $jumlahSiswa }}</div>
                    <div class="stat-label">Siswa</div>
                    <div class="stat-description">Peserta didik</div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="stat-item">
                    <i class="bi bi-person-workspace"></i>
                    <div class="stat-number">{{ $jumlahGuru }}</div>
                    <div class="stat-label">Guru</div>
                    <div class="stat-description">Tenaga pendidik</div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="stat-item">
                    <i class="bi bi-trophy-fill"></i>
                    <div class="stat-number">{{ $jumlahPrestasi }}</div>
                    <div class="stat-label">Prestasi</div>
                    <div class="stat-description">Pencapaian sekolah</div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="stat-item">
                    <i class="bi bi-stars"></i>
                    <div class="stat-number">{{ $jumlahEkskul }}</div>
                    <div class="stat-label">Ekstrakurikuler</div>
                    <div class="stat-description">Kegiatan siswa</div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ================= TENTANG SEKOLAH ================= --}}

<section id="profil" class="section-padding bg-white">
    <div class="container">

        {{-- JUDUL SECTION --}}
        <div class="text-center mb-5">
            <h2 class="section-title">Tentang Kami</h2>
            <p class="section-subtitle">
                Mengenal lebih dekat SMA Negeri 5 Tasikmalaya
            </p>
        </div>

        <div class="row align-items-center g-5">

            {{-- FOTO KEPALA SEKOLAH --}}
            <div class="col-lg-5">
                <div class="text-center">
                    <img
                        src="{{ asset('uploads/profil/1791513278_foto.jpg') }}"
                        alt="Kepala Sekolah SMA Negeri 5 Tasikmalaya"
                        class="img-fluid rounded-4 shadow"
                        style="width:100%; max-width:380px;
                               height:430px; object-fit:cover;
                               object-position:center top;"
                        onerror="this.style.display='none';"
                    >

                    <div class="mt-3">
                        <h5 class="fw-bold mb-1" style="color:#0066a1;">
                            Kepala Sekolah
                        </h5>
                        <p class="text-muted mb-0">
                            SMA Negeri 5 Tasikmalaya
                        </p>
                    </div>
                </div>
            </div>

            {{-- SAMBUTAN KEPALA SEKOLAH --}}
            <div class="col-lg-7">

                <span class="text-uppercase fw-bold"
                      style="color:#0066a1; letter-spacing:2px;">
                    Sambutan Kepala Sekolah
                </span>

                <h2 class="fw-bold mt-2 mb-3">
                    Selamat Datang di Website
                    <span style="color:#0066a1;">
                        SMA Negeri 5 Tasikmalaya
                    </span>
                </h2>

                <div style="width:70px; height:4px;
                            background:#8ed8ff; border-radius:10px;
                            margin-bottom:25px;">
                </div>

                <p class="text-muted" style="line-height:1.9;">
                    Assalamu’alaikum warahmatullahi wabarakatuh.
                </p>

                <p class="text-muted" style="line-height:1.9;
                                             text-align:justify;">
                    Puji syukur kita panjatkan ke hadirat Allah SWT
                    atas rahmat dan karunia-Nya. Selamat datang di
                    website resmi SMA Negeri 5 Tasikmalaya.
                </p>

                <p class="text-muted" style="line-height:1.9;
                                             text-align:justify;">
                    Website ini merupakan sarana informasi dan
                    komunikasi yang menyediakan berbagai informasi
                    mengenai profil sekolah, kegiatan pembelajaran,
                    tenaga pendidik, prestasi peserta didik, serta
                    kegiatan sekolah lainnya.
                </p>

                <p class="text-muted" style="line-height:1.9;
                                             text-align:justify;">
                    Kami berharap website ini dapat memudahkan
                    masyarakat dalam mengenal SMA Negeri 5
                    Tasikmalaya sekaligus mempererat hubungan antara
                    sekolah, peserta didik, orang tua, alumni, dan
                    masyarakat.
                </p>

                <p class="text-muted" style="line-height:1.9;
                                             text-align:justify;">
                    Semoga SMA Negeri 5 Tasikmalaya senantiasa
                    berkembang menjadi lingkungan pendidikan yang
                    mendukung lahirnya generasi berprestasi,
                    berkarakter, dan bertanggung jawab.
                </p>

                <p class="text-muted" style="line-height:1.9;">
                    Wassalamu’alaikum warahmatullahi wabarakatuh.
                </p>

                {{-- TOMBOL DETAIL --}}
                <a href="{{ route('landing.tentang') }}"
                   class="btn btn-primary rounded-pill px-4 py-3 mt-2">
                    Pelajari Selengkapnya
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>

            </div>
        </div>
    </div>
</section>

{{-- Data Siswa --}}
<section id="siswa" class="section-padding bg-white">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="section-title">Data Siswa & Siswi</h2>
            <p class="section-subtitle">
                Mengenal Siswa & Siswi SMA NEGERI 5 Tasikmalaya
            </p>
        </div>

        <div class="row g-4">
            @forelse ($siswa as $item)
                <div class="col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body text-center">
                            <i class="bi bi-person-circle text-primary"
                               style="font-size: 45px;"></i>

                            <h5 class="mt-3 mb-2">
                                {{ $item->nama_siswa }}
                            </h5>

                            <p class="text-muted mb-1">
                                NISN: {{ $item->nisn }}
                            </p>

                            <p class="mb-0">
                                Tahun Masuk: {{ $item->tahun_masuk }}
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">
                        Belum ada data siswa.
                    </p>
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- ================= GURU ================= --}}
<section id="guru" class="section-padding bg-white">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="section-title">Guru & Tenaga Pendidik</h2>
            <p class="section-subtitle">
                Guru dan tenaga pendidik SMA Negeri 5 Tasikmalaya
            </p>
        </div>

        <div class="row g-4">
            @forelse($guru->take(6) as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="guru-card text-center p-4">

                        @if($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}"
                                 class="guru-photo"
                                 alt="{{ $item->nama_guru }}">
                        @else
                            <div class="guru-placeholder">
                                <i class="bi bi-person-fill"></i>
                            </div>
                        @endif

                        <div class="mt-3">
                            <div class="guru-name">{{ $item->nama_guru }}</div>
                            <div class="guru-jabatan mt-1">{{ $item->jabatan ?? 'Guru' }}</div>

                            <div class="guru-mapel mt-2">
                                <i class="bi bi-book me-1"></i>
                                {{ $item->mapel ?? '-' }}
                            </div>

                            <div class="mt-3">
                                <a href="{{ route('landing.guru.detail', $item->id_guru) }}"
                                   class="btn btn-sm"
                                   style="background:#0066a1;color:white;border-radius:8px;">
                                    <i class="bi bi-eye me-1"></i> Lihat Detail
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-person-workspace" style="font-size:50px;color:#8ed8ff;"></i>
                    <h5 class="mt-3">Belum ada data guru</h5>
                    <p class="text-muted">Data guru akan tampil di sini.</p>
                </div>
            @endforelse
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('landing.daftar.guru') }}"
               class="btn px-4 py-3"
               style="background:#0066a1;color:white;border-radius:10px;font-weight:600;">
                <i class="bi bi-people-fill me-2"></i>
                Lihat Semua Data Guru
                <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>

    </div>
</section>

{{-- ================= EKSTRAKURIKULER ================= --}}
<section id="ekskul" class="section-padding bg-white">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="section-title">Ekstrakurikuler</h2>
            <p class="section-subtitle">
                Kembangkan bakat, minat, dan kreativitas bersama kegiatan ekstrakurikuler sekolah
            </p>
        </div>

        <div class="row g-4">
            @forelse($ekskul->take(6) as $item)
            <div class="col-lg-4 col-md-6">
                <div class="ekskul-card">

                    @if($item->gambar)
                        <a href="{{ route('landing.ekskul.detail', $item->id_ekskul) }}">
                            <img src="{{ asset('storage/' . $item->gambar) }}"
                                class="ekskul-image"
                                alt="{{ $item->nama_ekskul }}">
                        </a>
                    @else
                        <div class="ekskul-placeholder">
                            <i class="bi bi-stars"></i>
                        </div>
                    @endif

                    <div class="p-4">
                        <div class="ekskul-name mb-3">
                            <a href="{{ route('landing.ekskul.detail', $item->id_ekskul) }}"
                            class="text-decoration-none"
                            style="color: inherit;">
                                {{ $item->nama_ekskul }}
                            </a>
                        </div>

                        <div class="ekskul-info mb-2">
                            <i class="bi bi-person-fill me-2"></i>
                            Pembina: {{ $item->pembina ?? '-' }}
                        </div>

                        <div class="ekskul-info mb-3">
                            <i class="bi bi-calendar-event me-2"></i>
                            {{ $item->jadwal_latihan ?? '-' }}
                        </div>

                        <p class="text-muted small mb-3">
                            {{ \Illuminate\Support\Str::limit(strip_tags($item->deskripsi), 100) }}
                        </p>

                        <a href="{{ route('landing.ekskul.detail', $item->id_ekskul) }}"
                        class="btn btn-primary w-100">
                            Lihat Detail
                            <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>

                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <i class="bi bi-stars" style="font-size:50px;color:#8ed8ff;"></i>
                <h5 class="mt-3">Belum ada ekstrakurikuler</h5>
                <p class="text-muted">Data ekstrakurikuler akan tampil di sini.</p>
            </div>
        @endforelse

        <div class="text-center mt-5">
            <a href="{{ route('landing.ekskul') }}"
            class="btn px-4 py-3"
            style="background:#0066a1;color:white;border-radius:10px;font-weight:600;">
                <i class="bi bi-calendar2-week me-2"></i>
                Lihat Semua Ekstrakurikuler
                <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>


    </div>
</section>

{{-- ================= PRESTASI ================= --}}
<section id="prestasi" class="achievement-section section-padding">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="section-title">Prestasi Sekolah</h2>
            <p class="section-subtitle">
                Berbagai pencapaian siswa SMA Negeri 5 Tasikmalaya
            </p>
        </div>

        <div class="row g-4">
            @forelse($prestasiTerbaru as $prestasi)
                <div class="col-lg-4 col-md-6">
                    <div class="achievement-card">

                        @if($prestasi->foto)
                            <img src="{{ asset('uploads/prestasi/' . $prestasi->foto) }}"
                                 class="achievement-image"
                                 alt="{{ $prestasi->nama_prestasi }}">
                        @else
                            <div class="achievement-placeholder">
                                <i class="bi bi-trophy-fill"></i>
                            </div>
                        @endif

                        <div class="p-4 d-flex flex-column">
                            <span class="achievement-year">
                                <i class="bi bi-calendar-event me-1"></i>
                                {{ $prestasi->tahun_ajaran }}
                            </span>

                            <h5 class="fw-bold mt-3">{{ $prestasi->nama_prestasi }}</h5>

                            <p class="text-muted">
                                {{ \Illuminate\Support\Str::limit(strip_tags($prestasi->deskripsi), 110) }}
                            </p>

                            <div class="mt-auto pt-2">
                                <a href="{{ route('landing.prestasi.detail', $prestasi->slug) }}"
                                   class="btn btn-primary btn-sm">
                                    Lihat Detail
                                    <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-trophy" style="font-size:50px;color:#8ed8ff;"></i>
                    <h5 class="mt-3">Belum ada prestasi</h5>
                </div>
            @endforelse
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('landing.daftar.prestasi') }}"
            class="btn px-4 py-3"
            style="background:#0066a1;color:white;border-radius:10px;font-weight:600;">
                <i class="bi bi-trophy me-2"></i>
                Lihat Semua Prestasi
                <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>

    </div>
</section>


{{-- ================= GALERI ================= --}}
<section id="galeri" class="gallery-section section-padding">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="section-title">Galeri Sekolah</h2>
            <p class="section-subtitle">
                Dokumentasi kegiatan dan aktivitas SMA Negeri 5 Tasikmalaya
            </p>
        </div>

        <div class="row g-4">
            @forelse($galeri->take(6) as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-card">


                        @if($item->file && $item->kategori == 'Foto')
                            <a href="{{ route('landing.galeri.detail', $item->id_galeri) }}">
                                <img
                                    src="{{ asset('uploads/galeri/' . $item->file) }}"
                                    class="gallery-image"
                                    alt="{{ $item->judul }}">
                            </a>

                        @elseif($item->file && $item->kategori == 'Video')
                            <a href="{{ route('landing.galeri.detail', $item->id_galeri) }}"
                            class="d-block position-relative">

                                <video
                                    class="gallery-image"
                                    preload="metadata"
                                    muted
                                    playsinline
                                    style="width:100%; height:250px; object-fit:cover; background:#000; pointer-events:none;">

                                    <source src="{{ asset('uploads/galeri/' . $item->file) }}">
                                </video>

                                <span class="position-absolute top-50 start-50 translate-middle
                                            rounded-circle d-flex align-items-center justify-content-center"
                                    style="width:55px;height:55px;background:rgba(0,102,161,.9);color:white;">
                                    <i class="bi bi-play-fill fs-2"></i>
                                </span>
                            </a>

                        @else
                            <div class="gallery-placeholder">
                                <i class="bi bi-images"></i>
                            </div>
                        @endif


                        {{-- JUDUL DAN KETERANGAN --}}
                        <div class="p-4">
                            <div class="gallery-title mb-2">
                                <a
                                    href="{{ route('landing.galeri.detail', $item->id_galeri) }}"
                                    class="text-decoration-none"
                                    style="color:inherit;">
                                    {{ $item->judul }}
                                </a>
                            </div>

                            <p class="gallery-text mb-0">
                                {{ \Illuminate\Support\Str::limit(strip_tags($item->keterangan), 100) }}
                            </p>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-images"
                       style="font-size:50px;color:#8ed8ff;"></i>

                    <h5 class="mt-3">Belum ada galeri</h5>

                    <p class="text-muted">
                        Dokumentasi kegiatan sekolah akan tampil di sini.
                    </p>
                </div>
            @endforelse
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('landing.daftar.galeri') }}"
               class="btn px-4 py-3"
               style="background:#0066a1;color:white;border-radius:10px;font-weight:600;">

                <i class="bi bi-images me-2"></i>
                Lihat Semua Galeri
                <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>

    </div>
</section>

{{-- ================= BERITA ================= --}}
<section id="berita" class="section-padding bg-white">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="section-title">Berita Terbaru</h2>
            <p class="section-subtitle">
                Informasi terbaru dari SMA Negeri 5 Tasikmalaya
            </p>
        </div>

        <div class="row g-4">
            @forelse($beritaTerbaru as $berita)
                <div class="col-lg-4 col-md-6">
                    <div class="news-card">

                        @if($berita->gambar)
                            <img src="{{ asset('storage/' . $berita->gambar) }}"
                                 class="news-image"
                                 alt="{{ $berita->judul }}">
                        @else
                            <div class="news-placeholder">
                                <i class="bi bi-newspaper"></i>
                            </div>
                        @endif

                        <div class="p-4">
                            <div class="news-date mb-2">
                                <i class="bi bi-calendar3 me-1"></i>
                                {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}
                            </div>

                            <div class="news-title mb-2">{{ $berita->judul }}</div>

                            <p class="news-text">
                                {{ \Illuminate\Support\Str::limit(strip_tags($berita->isi), 100) }}
                            </p>

                            <a href="{{ route('landing.berita.detail', $berita->slug) }}"
                               class="btn-detail">
                                Baca Selengkapnya
                                <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-newspaper" style="font-size:50px;color:#8ed8ff;"></i>
                    <h5 class="mt-3">Belum ada berita</h5>
                    <p class="text-muted">Berita terbaru akan tampil di sini.</p>
                </div>
            @endforelse
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('landing.daftar.berita') }}"
            class="btn px-4 py-3"
            style="background:#0066a1;color:white;border-radius:10px;font-weight:600;">
                <i class="bi bi-newspaper me-2"></i>
                Lihat Semua Berita
                <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>


    </div>
</section>

{{-- ================= PENGUMUMAN ================= --}}
<section id="pengumuman" class="announcement-section section-padding">
    <div class="container">

        {{-- Judul Section --}}
        <div class="text-center mb-5">
            <h2 class="section-title">Pengumuman</h2>
            <p class="section-subtitle">
                Informasi dan pengumuman terbaru dari SMA Negeri 5 Tasikmalaya
            </p>
        </div>

        {{-- Daftar Pengumuman --}}
        <div class="row g-4">
            @forelse($pengumuman->take(4) as $item)
                <div class="col-lg-6 col-md-12">
                    <div class="announcement-card h-100">

                        <div class="d-flex gap-3">
                            {{-- Ikon --}}
                            <div class="announcement-icon flex-shrink-0">
                                <i class="bi bi-megaphone-fill"></i>
                            </div>

                            {{-- Isi Pengumuman --}}
                            <div class="flex-grow-1">

                                {{-- Tanggal --}}
                                <div class="news-date mb-2">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    {{ $item->tanggal
                                        ? \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y')
                                        : '-' }}
                                </div>

                                {{-- Judul bisa diklik --}}
                                <h5 class="announcement-title mb-2">
                                    <a href="{{ route('landing.pengumuman.detail', $item->id_pengumuman) }}"
                                       class="text-decoration-none"
                                       style="color: inherit;">
                                        {{ $item->judul }}
                                    </a>
                                </h5>

                                {{-- Ringkasan --}}
                                <p class="announcement-text mb-3">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 130) }}
                                </p>

                                {{-- Tombol Detail --}}
                                <a href="{{ route('landing.pengumuman.detail', $item->id_pengumuman) }}"
                                   class="btn btn-primary btn-sm">
                                    Baca Selengkapnya
                                    <i class="bi bi-arrow-right ms-1"></i>
                                </a>

                            </div>
                        </div>

                    </div>
                </div>

            @empty
                {{-- Jika Belum Ada Data --}}
                <div class="col-12 text-center py-5">
                    <i class="bi bi-megaphone"
                       style="font-size:50px;color:#8ed8ff;"></i>

                    <h5 class="mt-3">Belum ada pengumuman</h5>

                    <p class="text-muted">
                        Pengumuman terbaru akan tampil di sini.
                    </p>
                </div>
            @endforelse
        </div>

        {{-- Tombol Lihat Semua --}}
        @if($pengumuman->count() > 0)
            <div class="text-center mt-5">
                <a href="{{ route('landing.daftar.pengumuman') }}"
                   class="btn px-4 py-3"
                   style="background:#0066a1;
                          color:white;
                          border-radius:10px;
                          font-weight:600;">

                    <i class="bi bi-megaphone me-2"></i>
                    Lihat Semua Pengumuman
                    <i class="bi bi-arrow-right ms-2"></i>

                </a>
            </div>
        @endif

    </div>
</section>

{{-- ================= CTA ================= --}}
{{-- <section class="cta section-padding">
    <div class="container text-center">

        <h2>Bersama SMA Negeri 5 Tasikmalaya</h2>

        <p class="mt-3 mb-4">
            Membangun generasi yang berkarakter, berprestasi,
            dan siap menghadapi masa depan.
        </p>

        <a href="#profil"
           class="btn btn-light px-4 py-2 fw-semibold"
           style="color:#0066a1;border-radius:10px;">
            <i class="bi bi-building me-1"></i>
            Kenali Sekolah Kami
        </a>

    </div>
</section> --}}

@endsection
