
@extends('layouts.landing')

@section('content')
<style>
    .detail-page {
        background: #f5f9ff;
        padding: 60px 0;
        min-height: 75vh;
    }

    .detail-card {
        background: white;
        border-radius: 18px;
        padding: 36px;
        box-shadow: 0 8px 30px rgba(0, 70, 120, .08);
    }

    .detail-title {
        color: #0066a1;
        font-weight: 700;
        line-height: 1.4;
    }

    .detail-date {
        color: #778899;
        font-size: 14px;
    }

    .detail-content {
        color: #495867;
        line-height: 1.9;
        white-space: pre-line;
        overflow-wrap: anywhere;
    }

    @media (max-width: 576px) {
        .detail-card {
            padding: 24px;
        }
    }
</style>

<section class="detail-page">
    <div class="container">

        <a href="{{ route('landing.daftar.pengumuman') }}"
           class="btn btn-outline-primary mb-4">
            <i class="bi bi-arrow-left me-2"></i>
            Kembali ke Semua Pengumuman
        </a>

        <article class="detail-card">
            <div class="detail-date mb-3">
                <i class="bi bi-calendar-event me-2"></i>
                {{ $pengumuman->tanggal
                    ? \Carbon\Carbon::parse($pengumuman->tanggal)->format('d F Y')
                    : '-' }}
            </div>

            <h2 class="detail-title mb-4">
                {{ $pengumuman->judul }}
            </h2>

            <hr class="mb-4">

            <div class="detail-content">{{ $pengumuman->isi }}</div>
        </article>

    </div>
</section>
@endsection
