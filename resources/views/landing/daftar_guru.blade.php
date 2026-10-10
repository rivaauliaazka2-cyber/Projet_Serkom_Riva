@extends('layouts.landing')

@section('title', 'Semua Guru - SMA Negeri 5 Tasikmalaya')

@push('styles')
<style>
    .guru-list-page {
        background: #f5f9fc;
        color: #333;
        padding-bottom: 60px;
        min-height: 70vh;
    }

    .guru-list-page .hero-section {
        padding: 55px 0 35px;
    }

    .guru-list-page .breadcrumb-custom {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: #eaf6ff;
        color: #006199;
        padding: 8px 15px;
        border-radius: 50px;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 18px;
    }

    .guru-list-page .page-title {
        color: #004d7a;
        font-size: 34px;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .guru-list-page .page-subtitle {
        color: #6c757d;
        max-width: 600px;
        margin: auto;
        line-height: 1.7;
    }

    .guru-list-page .guru-card {
        background: #fff;
        border: 1px solid rgba(0,97,153,.07);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0,77,122,.08);
        transition: all .3s ease;
        height: 100%;
    }

    .guru-list-page .guru-card:hover {
        transform: translateY(-7px);
        box-shadow: 0 15px 35px rgba(0,77,122,.15);
    }

    .guru-list-page .image-wrapper {
        position: relative;
        overflow: hidden;
        background: #eaf6ff;
    }

    .guru-list-page .guru-image,
    .guru-list-page .guru-placeholder {
        width: 100%;
        height: 260px;
    }

    .guru-list-page .guru-image {
        object-fit: cover;
        object-position: center top;
        transition: transform .4s ease;
    }

    .guru-list-page .guru-card:hover .guru-image {
        transform: scale(1.04);
    }

    .guru-list-page .guru-placeholder {
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #eaf6ff, #d8f0ff);
        font-size: 75px;
        color: #006199;
    }

    .guru-list-page .image-overlay {
        position: absolute;
        left: 15px;
        top: 15px;
        background: rgba(255,255,255,.93);
        color: #006199;
        padding: 6px 12px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 700;
    }

    .guru-list-page .guru-content {
        padding: 22px;
    }

    .guru-list-page .guru-name {
        font-size: 19px;
        font-weight: 700;
        color: #005b8f;
        margin-bottom: 16px;
        line-height: 1.5;
    }

    .guru-list-page .info-item {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        color: #666;
        font-size: 14px;
        margin-bottom: 12px;
        overflow-wrap: anywhere;
    }

    .guru-list-page .info-icon {
        width: 32px;
        height: 32px;
        min-width: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eaf6ff;
        color: #006199;
        border-radius: 9px;
    }

    .guru-list-page .info-label {
        color: #777;
        font-size: 12px;
        display: block;
        margin-bottom: 3px;
    }

    .guru-list-page .info-value {
        color: #444;
        font-weight: 500;
    }

    .guru-list-page .btn-detail {
        background: #006199;
        border: none;
        border-radius: 10px;
        padding: 10px 15px;
        font-weight: 600;
        color: #fff;
        transition: .3s;
    }

    .guru-list-page .btn-detail:hover {
        background: #004d7a;
        color: #fff;
        transform: translateY(-1px);
    }

    .guru-list-page .empty-box {
        background: #fff;
        border-radius: 20px;
        padding: 60px 20px;
        box-shadow: 0 8px 25px rgba(0,77,122,.07);
    }

    .guru-list-page .empty-icon {
        width: 70px;
        height: 70px;
        margin: 0 auto 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: #eaf6ff;
        color: #006199;
        font-size: 30px;
    }

    .guru-list-page .back-button {
        border-radius: 10px;
        padding: 10px 20px;
        font-weight: 600;
    }

    @media(max-width:576px) {
        .guru-list-page .page-title {
            font-size: 28px;
        }

        .guru-list-page .hero-section {
            padding-top: 40px;
        }

        .guru-list-page .guru-image,
        .guru-list-page .guru-placeholder {
            height: 230px;
        }
    }
</style>
@endpush

@section('content')

<div class="guru-list-page">

    <section class="hero-section">
        <div class="container text-center">

            <div class="breadcrumb-custom">
                <i class="bi bi-house-fill"></i>
                <i class="bi bi-chevron-right"></i>
                <span>Guru</span>
            </div>

            <h1 class="page-title">Semua Guru</h1>

            <p class="page-subtitle">
                Kenali guru dan tenaga pendidik SMA Negeri 5 Tasikmalaya
                yang mendukung kegiatan pembelajaran dan pengembangan siswa.
            </p>

        </div>
    </section>

    <div class="container">
        <div class="row g-4">

            @forelse($guru as $item)

                <div class="col-lg-4 col-md-6">
                    <div class="guru-card">

                        <div class="image-wrapper">

                            @if($item->foto)
                                <img
                                    src="{{ asset('storage/' . $item->foto) }}"
                                    class="guru-image"
                                    alt="Foto {{ $item->nama_guru }}"
                                    loading="lazy"
                                    onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                                >

                                <div class="guru-placeholder" style="display:none;">
                                    <i class="bi bi-person-badge-fill"></i>
                                </div>
                            @else
                                <div class="guru-placeholder">
                                    <i class="bi bi-person-badge-fill"></i>
                                </div>
                            @endif

                            <div class="image-overlay">
                                <i class="bi bi-person-fill me-1"></i>
                                Guru
                            </div>

                        </div>

                        <div class="guru-content">

                            <div class="guru-name">
                                {{ $item->nama_guru }}
                            </div>

                            <div class="info-item">
                                <span class="info-icon">
                                    <i class="bi bi-person-vcard"></i>
                                </span>
                                <div>
                                    <span class="info-label">NIP</span>
                                    <span class="info-value">
                                        {{ $item->nip ?: '-' }}
                                    </span>
                                </div>
                            </div>

                            <div class="info-item">
                                <span class="info-icon">
                                    <i class="bi bi-book"></i>
                                </span>
                                <div>
                                    <span class="info-label">Mata Pelajaran</span>
                                    <span class="info-value">
                                        {{ $item->mapel ?: '-' }}
                                    </span>
                                </div>
                            </div>

                            <div class="info-item mb-4">
                                <span class="info-icon">
                                    <i class="bi bi-briefcase"></i>
                                </span>
                                <div>
                                    <span class="info-label">Jabatan</span>
                                    <span class="info-value">
                                        {{ $item->jabatan ?: '-' }}
                                    </span>
                                </div>
                            </div>

                            <a
                                href="{{ route('landing.guru.detail', $item->id_guru) }}"
                                class="btn btn-detail w-100"
                            >
                                Lihat Detail
                                <i class="bi bi-arrow-right ms-1"></i>
                            </a>

                        </div>
                    </div>
                </div>

            @empty

                <div class="col-12">
                    <div class="empty-box text-center">

                        <div class="empty-icon">
                            <i class="bi bi-people-fill"></i>
                        </div>

                        <h5 class="fw-bold text-dark">
                            Belum Ada Data Guru
                        </h5>

                        <p class="text-muted mb-0">
                            Data guru belum tersedia saat ini.
                        </p>

                    </div>
                </div>

            @endforelse

        </div>

        <div class="text-center mt-5">
            <a href="{{ route('landing') }}" class="btn btn-outline-primary back-button">
                <i class="bi bi-arrow-left me-1"></i>
                Kembali ke Beranda
            </a>
        </div>
    </div>

</div>

@endsection
