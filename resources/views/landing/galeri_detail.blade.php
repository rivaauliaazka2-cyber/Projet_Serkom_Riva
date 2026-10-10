
@extends('layouts.landing')

@section('title', $galeri->judul . ' - Galeri SMAN 5 Tasikmalaya')

@push('styles')
<style>
    .galeri-detail-page {
        background: #f5f9ff;
        padding: 60px 0;
        min-height: 75vh;
    }

    .galeri-detail-card {
        background: #fff;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(0, 70, 120, .08);
    }

    .galeri-detail-image {
        width: 100%;
        max-height: 550px;
        height: auto;
        object-fit: contain;
        background: #eaf6ff;
        display: block;
    }

    .galeri-detail-content {
        padding: 30px;
    }

    .galeri-detail-title {
        color: #0066a1;
        font-weight: 800;
    }

    .galeri-detail-description {
        color: #5f6b75;
        line-height: 1.8;
        white-space: pre-line;
    }

    .galeri-detail-badge {
        display: inline-block;
        background: #e4f4ff;
        color: #0066a1;
        padding: 7px 14px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
    }

    .galeri-detail-back {
        display: inline-block;
        background: #0066a1;
        color: white;
        padding: 11px 22px;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 600;
        transition: background .2s ease;
    }

    .galeri-detail-back:hover {
        background: #004d7a;
        color: white;
    }

    .galeri-detail-video {
        width: 100%;
        max-height: 550px;
        height: auto;
        display: block;
        background: #000;
    }

    @media (max-width: 768px) {
        .galeri-detail-page {
            padding: 35px 0;
        }

        .galeri-detail-content {
            padding: 20px;
        }

        .galeri-detail-title {
            font-size: 24px;
        }
    }
</style>
@endpush

@section('content')
<section class="galeri-detail-page">
    <div class="container">

        {{-- TOMBOL KEMBALI --}}
        <div class="mb-4">
            <a href="{{ route('landing.daftar.galeri') }}"
               class="galeri-detail-back">
                <i class="bi bi-arrow-left me-2"></i>
                Kembali ke Galeri
            </a>
        </div>

        {{-- KARTU DETAIL GALERI --}}
        <div class="galeri-detail-card">

            {{-- JIKA KATEGORI FOTO --}}
            @if ($galeri->file && $galeri->kategori == 'Foto')

                <img
                    src="{{ asset('uploads/galeri/' . $galeri->file) }}"
                    alt="{{ $galeri->judul }}"
                    class="galeri-detail-image"
                >

            {{-- JIKA KATEGORI VIDEO --}}
            @elseif ($galeri->file && $galeri->kategori == 'Video')

                <video
                    class="galeri-detail-video"
                    controls
                    playsinline
                    preload="metadata">

                    <source
                        src="{{ asset('uploads/galeri/' . $galeri->file) }}">

                    Browser kamu tidak mendukung pemutaran video.
                </video>

            {{-- JIKA FILE BELUM ADA --}}
            @else

                <div class="text-center py-5"
                     style="background:#eaf6ff;">

                    <i class="bi bi-images"
                       style="font-size:60px;color:#8ed8ff;"></i>

                    <p class="text-muted mt-3 mb-0">
                        File galeri belum tersedia.
                    </p>
                </div>

            @endif

            {{-- INFORMASI GALERI --}}
            <div class="galeri-detail-content">

                <span class="galeri-detail-badge">
                    @if ($galeri->kategori == 'Video')
                        <i class="bi bi-camera-video me-1"></i>
                    @else
                        <i class="bi bi-images me-1"></i>
                    @endif

                    {{ $galeri->kategori }}
                </span>

                <h2 class="galeri-detail-title mt-3">
                    {{ $galeri->judul }}
                </h2>

                <p class="text-muted">
                    <i class="bi bi-calendar3 me-2"></i>

                    {{ $galeri->tanggal
                        ? \Carbon\Carbon::parse($galeri->tanggal)->format('d F Y')
                        : '-' }}
                </p>

                <hr>

                <h5 class="fw-bold mb-3">
                    Keterangan Galeri
                </h5>

                <p class="galeri-detail-description mb-0">{{ $galeri->keterangan ?: 'Tidak ada keterangan untuk galeri ini.' }}</p>

            </div>
        </div>

    </div>
</section>
@endsection
