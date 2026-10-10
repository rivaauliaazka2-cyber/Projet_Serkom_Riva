
@extends('layouts.landing')

@section('content')

<style>
    .ekskul-detail-section {
        background: #f5f9ff;
        padding: 60px 0 80px;
        min-height: 75vh;
    }

    .ekskul-detail-card {
        background: #fff;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(0, 70, 120, 0.10);
    }

    .ekskul-detail-image {
        width: 100%;
        height: 420px;
        object-fit: cover;
        display: block;
    }

    .ekskul-detail-placeholder {
        height: 320px;
        background: #eaf6ff;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #0066a1;
        font-size: 80px;
    }

    .ekskul-detail-content {
        padding: 35px;
    }

    .ekskul-detail-title {
        color: #0066a1;
        font-weight: 700;
        font-size: 30px;
        margin-bottom: 25px;
    }

    .ekskul-info-box {
        background: #f5f9ff;
        border: 1px solid #e2effa;
        border-radius: 12px;
        padding: 18px;
        height: 100%;
    }

    .ekskul-info-label {
        color: #6c757d;
        font-size: 14px;
        margin-bottom: 8px;
    }

    .ekskul-info-label i {
        color: #0066a1;
        font-size: 19px;
        margin-right: 7px;
    }

    .ekskul-info-value {
        color: #263746;
        font-weight: 600;
        margin-bottom: 0;
    }

    .ekskul-description {
        color: #596775;
        font-size: 16px;
        line-height: 1.9;
        white-space: pre-line;
        overflow-wrap: anywhere;
    }

    .ekskul-back-button {
        border-radius: 9px;
        padding: 10px 18px;
    }

    @media (max-width: 768px) {
        .ekskul-detail-image {
            height: 260px;
        }

        .ekskul-detail-content {
            padding: 24px;
        }

        .ekskul-detail-title {
            font-size: 24px;
        }
    }
</style>

<section class="ekskul-detail-section">
    <div class="container">

        {{-- Tombol Kembali --}}
        <a href="{{ route('landing.ekskul') }}"
           class="btn btn-outline-primary ekskul-back-button mb-4">
            <i class="bi bi-arrow-left me-2"></i>
            Kembali ke Daftar Ekskul
        </a>

        <div class="ekskul-detail-card">

            {{-- Gambar Ekskul --}}
            @if($ekskul->gambar)
                <img
                    src="{{ asset('storage/' . $ekskul->gambar) }}"
                    alt="{{ $ekskul->nama_ekskul }}"
                    class="ekskul-detail-image"
                >
            @else
                <div class="ekskul-detail-placeholder">
                    <i class="bi bi-stars"></i>
                </div>
            @endif

            <div class="ekskul-detail-content">

                {{-- Nama Ekskul --}}
                <h1 class="ekskul-detail-title">
                    {{ $ekskul->nama_ekskul }}
                </h1>

                {{-- Informasi Ekskul --}}
                <div class="row g-3 mb-4">

                    <div class="col-md-6">
                        <div class="ekskul-info-box">
                            <div class="ekskul-info-label">
                                <i class="bi bi-person-fill"></i>
                                Pembina Ekstrakurikuler
                            </div>

                            <p class="ekskul-info-value">
                                {{ $ekskul->pembina ?: 'Belum ditentukan' }}
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="ekskul-info-box">
                            <div class="ekskul-info-label">
                                <i class="bi bi-calendar-event"></i>
                                Jadwal Latihan
                            </div>

                            <p class="ekskul-info-value">
                                {{ $ekskul->jadwal_latihan ?: 'Belum ditentukan' }}
                            </p>
                        </div>
                    </div>

                </div>

                {{-- Deskripsi --}}
                <div class="mb-4">
                    <h5 class="fw-bold mb-3">
                        <i class="bi bi-info-circle me-2"
                           style="color:#0066a1;"></i>
                        Tentang Ekstrakurikuler
                    </h5>

                    <div class="ekskul-description">
                        @if($ekskul->deskripsi)
                            {{ $ekskul->deskripsi }}
                        @else
                            Belum ada deskripsi ekstrakurikuler.
                        @endif
                    </div>
                </div>

                {{-- Tombol Bawah --}}
                <div class="mt-4">
                    <a href="{{ route('landing.ekskul') }}"
                       class="btn btn-primary">
                        <i class="bi bi-arrow-left me-2"></i>
                        Lihat Ekskul Lainnya
                    </a>
                </div>

            </div>
        </div>

    </div>
</section>

@endsection
