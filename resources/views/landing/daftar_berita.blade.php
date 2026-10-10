@extends('layouts.landing')

@section('title', 'Semua Berita - SMA Negeri 5 Tasikmalaya')

@push('styles')
<style>
    .berita-page {
        background: #f5f9ff;
        min-height: 70vh;
        padding-bottom: 65px;
    }

    .berita-page .hero-section {
        padding: 55px 0 40px;
    }

    .berita-page .breadcrumb-custom {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        background: #eaf6ff;
        color: #006199;
        border-radius: 50px;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 18px;
    }

    .berita-page .page-title {
        color: #004d7a;
        font-size: 36px;
        font-weight: 800;
        margin-bottom: 12px;
    }

    .berita-page .page-subtitle {
        max-width: 650px;
        margin: auto;
        color: #6c757d;
        line-height: 1.8;
    }

    .berita-page .berita-card {
        height: 100%;
        background: #fff;
        border: 1px solid #e3eef6;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0, 77, 122, .07);
        transition: .3s ease;
    }

    .berita-page .berita-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 15px 35px rgba(0, 77, 122, .13);
    }

    .berita-page .berita-image-wrapper {
        height: 220px;
        background: #eaf6ff;
        overflow: hidden;
        position: relative;
    }

    .berita-page .berita-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .4s ease;
    }

    .berita-page .berita-card:hover .berita-image {
        transform: scale(1.04);
    }

    .berita-page .image-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #006199;
        font-size: 60px;
        background: linear-gradient(135deg, #eaf6ff, #d8f0ff);
    }

    .berita-page .berita-content {
        padding: 23px;
    }

    .berita-page .berita-date {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        color: #006199;
        background: #eaf6ff;
        border-radius: 7px;
        padding: 6px 10px;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 13px;
    }

    .berita-page .berita-title {
        color: #004d7a;
        font-size: 19px;
        font-weight: 700;
        line-height: 1.5;
        margin-bottom: 12px;
        overflow-wrap: anywhere;
    }

    .berita-page .berita-description {
        color: #6c757d;
        font-size: 14px;
        line-height: 1.8;
        margin-bottom: 20px;
        overflow-wrap: anywhere;
    }

    .berita-page .btn-detail {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        width: 100%;
        padding: 11px 16px;
        background: #006199;
        color: #fff;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 600;
        transition: .3s;
    }

    .berita-page .btn-detail:hover {
        background: #004d7a;
        color: #fff;
    }

    .berita-page .empty-box {
        padding: 60px 20px;
        background: #fff;
        border: 1px solid #e3eef6;
        border-radius: 20px;
        text-align: center;
    }

    .berita-page .empty-icon {
        width: 75px;
        height: 75px;
        margin: 0 auto 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eaf6ff;
        color: #006199;
        border-radius: 50%;
        font-size: 32px;
    }

    .berita-page .back-button {
        padding: 11px 22px;
        border-radius: 10px;
        font-weight: 600;
    }

    @media(max-width: 576px) {
        .berita-page .hero-section {
            padding-top: 40px;
        }

        .berita-page .page-title {
            font-size: 28px;
        }

        .berita-page .berita-image-wrapper {
            height: 200px;
        }
    }
</style>
@endpush

@section('content')

<div class="berita-page">

    {{-- HEADER --}}
    <section class="hero-section">
        <div class="container text-center">

            <div class="breadcrumb-custom">
                <i class="bi bi-house-fill"></i>
                <i class="bi bi-chevron-right"></i>
                <span>Berita</span>
            </div>

            <h1 class="page-title">Semua Berita</h1>

            <p class="page-subtitle">
                Temukan informasi terbaru mengenai kegiatan, prestasi,
                dan berbagai kabar dari SMA Negeri 5 Tasikmalaya.
            </p>

        </div>
    </section>

    {{-- DAFTAR BERITA --}}
    <div class="container">

        <div class="row g-4">

            @forelse($berita as $item)

                <div class="col-lg-4 col-md-6">
                    <article class="berita-card">

                        {{-- GAMBAR BERITA --}}
                        <div class="berita-image-wrapper">

                            @if($item->gambar)
                                <img
                                    src="{{ asset('storage/' . $item->gambar) }}"
                                    class="berita-image"
                                    alt="{{ $item->judul }}"
                                    loading="lazy"
                                    onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                                >

                                <div class="image-placeholder" style="display:none;">
                                    <i class="bi bi-newspaper"></i>
                                </div>
                            @else
                                <div class="image-placeholder">
                                    <i class="bi bi-newspaper"></i>
                                </div>
                            @endif

                        </div>

                        <div class="berita-content">

                            {{-- TANGGAL --}}
                            <div class="berita-date">
                                <i class="bi bi-calendar-event"></i>

                                @if($item->tanggal)
                                    {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                                @else
                                    Tanggal belum tersedia
                                @endif
                            </div>

                            {{-- JUDUL --}}
                            <h2 class="berita-title">
                                {{ $item->judul }}
                            </h2>

                            {{-- RINGKASAN --}}
                            <p class="berita-description">
                                {{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 130) }}
                            </p>

                            {{-- DETAIL --}}
                            <a
                                href="{{ route('landing.berita.detail', $item->slug) }}"
                                class="btn-detail"
                            >
                                Baca Selengkapnya
                                <i class="bi bi-arrow-right"></i>
                            </a>

                        </div>
                    </article>
                </div>

            @empty

                <div class="col-12">
                    <div class="empty-box">

                        <div class="empty-icon">
                            <i class="bi bi-newspaper"></i>
                        </div>

                        <h4 class="fw-bold text-dark">
                            Belum Ada Berita
                        </h4>

                        <p class="text-muted mb-0">
                            Belum ada berita yang dipublikasikan saat ini.
                        </p>

                    </div>
                </div>

            @endforelse

        </div>

        {{-- KEMBALI --}}
        <div class="text-center mt-5">
            <a href="{{ route('landing') }}#berita"
               class="btn btn-outline-primary back-button">
                <i class="bi bi-arrow-left me-1"></i>
                Kembali ke Beranda
            </a>
        </div>

    </div>
</div>

@endsection
