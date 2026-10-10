
@extends('layouts.landing')

@section('content')
<style>
    .pengumuman-page {
        background: #f5f9ff;
        min-height: 75vh;
        padding: 60px 0;
    }

    .pengumuman-card {
        background: white;
        border-radius: 14px;
        padding: 24px;
        height: 100%;
        border: 1px solid #e5eef7;
        box-shadow: 0 5px 18px rgba(0, 70, 120, .06);
        transition: .2s;
    }

    .pengumuman-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(0, 70, 120, .12);
    }

    .pengumuman-card h5 {
        color: #0066a1;
        font-weight: 700;
    }

    .tanggal {
        color: #778899;
        font-size: 14px;
    }

    .judul-halaman {
        color: #0066a1;
        font-weight: 700;
    }
</style>

<section class="pengumuman-page">
    <div class="container">

        <a href="{{ route('landing') }}#pengumuman"
           class="btn btn-outline-primary mb-4">
            <i class="bi bi-arrow-left me-2"></i>Kembali
        </a>

        <div class="text-center mb-5">
            <h2 class="judul-halaman">Semua Pengumuman</h2>
            <p class="text-muted">
                Informasi dan pengumuman terbaru dari SMA Negeri 5 Tasikmalaya
            </p>
        </div>

        <div class="row g-4">
            @forelse($pengumuman as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="pengumuman-card">

                        <div class="tanggal mb-3">
                            <i class="bi bi-calendar-event me-2"></i>
                            {{ $item->tanggal
                                ? \Carbon\Carbon::parse($item->tanggal)->format('d M Y')
                                : '-' }}
                        </div>

                        <h5 class="mb-3">{{ $item->judul }}</h5>

                        <p class="text-muted">
                            {{ \Illuminate\Support\Str::limit(
                                strip_tags($item->isi), 120
                            ) }}
                        </p>

                        <a href="{{ route('landing.pengumuman.detail', $item->id_pengumuman) }}"
                           class="btn btn-primary w-100 mt-2">
                            Baca Selengkapnya
                            <i class="bi bi-arrow-right ms-2"></i>
                        </a>

                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-megaphone"
                       style="font-size:50px;color:#8ed8ff;"></i>
                    <h5 class="mt-3">Belum ada pengumuman</h5>
                    <p class="text-muted">
                        Pengumuman sekolah akan ditampilkan di sini.
                    </p>
                </div>
            @endforelse
        </div>

    </div>
</section>
@endsection
