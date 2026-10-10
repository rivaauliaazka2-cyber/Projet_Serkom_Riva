
@extends('layouts.landing')

@section('title', 'Galeri Sekolah - SMA Negeri 5 Tasikmalaya')

@push('styles')
<style>
    .galeri-page {
        background: #f5f9ff;
        min-height: 75vh;
        padding: 60px 0;
    }

    .galeri-page .page-title {
        color: #0066a1;
        font-weight: 800;
    }

    .galeri-page .page-subtitle {
        color: #6c757d;
    }

    .galeri-page .galeri-card {
        height: 100%;
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 70, 120, .08);
        transition: .3s ease;
    }

    .galeri-page .galeri-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 70, 120, .15);
    }

    .galeri-page .galeri-image {
        width: 100%;
        height: 230px;
        object-fit: cover;
        background: #eaf6ff;
        display: block;
    }

    .galeri-page .galeri-media-button {
        position: relative;
        display: block;
        width: 100%;
        padding: 0;
        border: 0;
        cursor: pointer;
        background: #eaf6ff;
    }

    .galeri-page .galeri-media-button video {
        pointer-events: none;
    }

    .galeri-page .play-icon {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 58px;
        height: 58px;
        border-radius: 50%;
        background: rgba(0, 102, 161, .92);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
    }

    .galeri-page .galeri-content {
        padding: 20px;
    }

    .galeri-page .galeri-title {
        color: #16415d;
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 10px;
        overflow-wrap: anywhere;
    }

    .galeri-page .galeri-description {
        color: #6c757d;
        font-size: 14px;
        margin-bottom: 12px;
        overflow-wrap: anywhere;
    }

    .galeri-page .galeri-badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 20px;
        color: #0066a1;
        background: #e4f4ff;
        font-size: 12px;
        font-weight: 600;
    }

    .galeri-page .btn-back {
        background: #0066a1;
        color: #fff;
        border-radius: 10px;
        padding: 11px 22px;
        font-weight: 600;
        text-decoration: none;
        display: inline-block;
        transition: .2s ease;
    }

    .galeri-page .btn-back:hover {
        background: #004d7a;
        color: #fff;
    }

    .galeri-page .empty-state {
        background: #fff;
        border-radius: 16px;
        padding: 50px 20px;
        color: #6c757d;
    }

    .galeri-modal-media {
        width: 100%;
        max-height: 75vh;
        object-fit: contain;
        background: #000;
    }

    @media (max-width: 768px) {
        .galeri-page {
            padding: 35px 0;
        }

        .galeri-page .galeri-content {
            padding: 16px;
        }
    }
</style>
@endpush

@section('content')
<section class="galeri-page">
    <div class="container">

        {{-- JUDUL HALAMAN --}}
        <div class="text-center mb-5">
            <h2 class="page-title">Galeri Sekolah</h2>

            <p class="page-subtitle">
                Dokumentasi kegiatan dan berbagai momen
                SMA Negeri 5 Tasikmalaya
            </p>
        </div>

        {{-- DAFTAR GALERI --}}
        <div class="row g-4">

            @forelse ($galeri as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="galeri-card">

                        {{-- FOTO --}}
                        @if ($item->file && $item->kategori == 'Foto')

                            <button
                                type="button"
                                class="galeri-media-button"
                                data-bs-toggle="modal"
                                data-bs-target="#galeriModal{{ $loop->index }}"
                                aria-label="Lihat foto {{ $item->judul }}">

                                <img
                                    src="{{ asset('uploads/galeri/' . $item->file) }}"
                                    alt="{{ $item->judul }}"
                                    class="galeri-image"
                                    loading="lazy">
                            </button>

                        {{-- VIDEO --}}
                        @elseif ($item->file && $item->kategori == 'Video')

                            <button
                                type="button"
                                class="galeri-media-button"
                                data-bs-toggle="modal"
                                data-bs-target="#galeriModal{{ $loop->index }}"
                                aria-label="Putar video {{ $item->judul }}">

                                <video
                                    class="galeri-image"
                                    preload="metadata"
                                    muted
                                    playsinline>

                                    <source
                                        src="{{ asset('uploads/galeri/' . $item->file) }}">
                                </video>

                                <span class="play-icon">
                                    <i class="bi bi-play-fill"></i>
                                </span>
                            </button>

                        {{-- FILE TIDAK TERSEDIA --}}
                        @else

                            <div class="galeri-image d-flex align-items-center justify-content-center">
                                <i class="bi bi-images text-secondary"
                                   style="font-size:55px;"></i>
                            </div>

                        @endif

                        {{-- JUDUL DAN KETERANGAN --}}
                        <div class="galeri-content">

                            <h5 class="galeri-title">
                                {{ $item->judul }}
                            </h5>

                            <p class="galeri-description">
                                {{ $item->keterangan ?: 'Dokumentasi kegiatan sekolah.' }}
                            </p>

                            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">

                                <span class="galeri-badge">
                                    @if ($item->kategori == 'Video')
                                        <i class="bi bi-camera-video me-1"></i>
                                    @else
                                        <i class="bi bi-images me-1"></i>
                                    @endif

                                    {{ $item->kategori }}
                                </span>

                                <small class="text-muted">
                                    <i class="bi bi-calendar3 me-1"></i>

                                    {{ $item->tanggal
                                        ? \Carbon\Carbon::parse($item->tanggal)->format('d M Y')
                                        : '-' }}
                                </small>

                            </div>
                        </div>
                    </div>
                </div>

                {{-- MODAL DETAIL FOTO / VIDEO --}}
                @if ($item->file)

                    <div
                        class="modal fade"
                        id="galeriModal{{ $loop->index }}"
                        tabindex="-1"
                        aria-labelledby="galeriModalLabel{{ $loop->index }}"
                        aria-hidden="true">

                        <div class="modal-dialog modal-dialog-centered modal-lg">

                            <div class="modal-content border-0"
                                 style="border-radius:15px; overflow:hidden;">

                                {{-- HEADER MODAL --}}
                                <div class="modal-header">

                                    <div>
                                        <h5
                                            class="modal-title fw-bold"
                                            id="galeriModalLabel{{ $loop->index }}">
                                            {{ $item->judul }}
                                        </h5>

                                        <span class="galeri-badge mt-2">
                                            {{ $item->kategori }}
                                        </span>
                                    </div>

                                    <button
                                        type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal"
                                        aria-label="Tutup">
                                    </button>

                                </div>

                                {{-- MEDIA DETAIL --}}
                                <div class="modal-body p-2">

                                    @if ($item->kategori == 'Foto')

                                        <img
                                            src="{{ asset('uploads/galeri/' . $item->file) }}"
                                            alt="{{ $item->judul }}"
                                            class="img-fluid galeri-modal-media"
                                            style="background:#eaf6ff;">

                                    @elseif ($item->kategori == 'Video')

                                        <video
                                            class="galeri-modal-media"
                                            controls
                                            playsinline
                                            preload="metadata">

                                            <source
                                                src="{{ asset('uploads/galeri/' . $item->file) }}">

                                            Browser kamu tidak mendukung pemutaran video.

                                        </video>

                                    @endif

                                    {{-- KETERANGAN DETAIL --}}
                                    <div class="p-3">

                                        <p class="text-muted mb-3">
                                            <i class="bi bi-calendar3 me-2"></i>

                                            {{ $item->tanggal
                                                ? \Carbon\Carbon::parse($item->tanggal)->format('d M Y')
                                                : '-' }}
                                        </p>

                                        <h6 class="fw-bold">
                                            Keterangan Galeri
                                        </h6>

                                        <p class="mb-0"
                                           style="white-space:pre-line; overflow-wrap:anywhere;">
                                            {{ $item->keterangan ?: 'Tidak ada keterangan untuk galeri ini.' }}
                                        </p>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                @endif

            @empty

                <div class="col-12">
                    <div class="empty-state text-center">

                        <i class="bi bi-images"
                           style="font-size:55px;color:#8ed8ff;"></i>

                        <h5 class="mt-3 fw-bold">
                            Belum Ada Galeri
                        </h5>

                        <p class="mb-0">
                            Galeri kegiatan sekolah belum tersedia.
                        </p>

                    </div>
                </div>

            @endforelse

        </div>

        {{-- TOMBOL KEMBALI --}}
        <div class="text-center mt-5">
            <a href="{{ route('landing') }}#galeri"
               class="btn-back">

                <i class="bi bi-arrow-left me-2"></i>
                Kembali ke Beranda

            </a>
        </div>

    </div>
</section>

{{-- HENTIKAN VIDEO SAAT MODAL DITUTUP --}}
@push('scripts')
<script>
    document.querySelectorAll('.galeri-page .modal').forEach(function (modal) {
        modal.addEventListener('hidden.bs.modal', function () {
            const video = modal.querySelector('video');

            if (video) {
                video.pause();
                video.currentTime = 0;
            }
        });
    });
</script>
@endpush

@endsection
