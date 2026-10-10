
@extends('layouts.landing')

@section('content')

<style>
    .daftar-ekskul-section {
        background: #f5f9ff;
        padding: 60px 0 80px;
        min-height: 75vh;
    }

    .daftar-ekskul-title {
        color: #0066a1;
        font-weight: 700;
    }

    .daftar-ekskul-subtitle {
        color: #718096;
    }

    .daftar-ekskul-card {
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        height: 100%;
        border: 1px solid #e5eef7;
        box-shadow: 0 5px 20px rgba(0, 70, 120, .07);
        transition: transform .2s, box-shadow .2s;
    }

    .daftar-ekskul-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 26px rgba(0, 70, 120, .13);
    }

    .daftar-ekskul-image {
        width: 100%;
        height: 230px;
        object-fit: cover;
        display: block;
    }

    .daftar-ekskul-placeholder {
        height: 230px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eaf6ff;
        color: #0066a1;
        font-size: 65px;
    }

    .daftar-ekskul-name {
        color: #0066a1;
        font-size: 20px;
        font-weight: 700;
    }

    .daftar-ekskul-info {
        color: #526171;
        font-size: 14px;
    }

    .daftar-ekskul-info i {
        color: #0066a1;
    }

    .daftar-ekskul-description {
        color: #718096;
        font-size: 14px;
        line-height: 1.7;
    }

    .daftar-ekskul-back {
        border-radius: 9px;
        padding: 10px 18px;
    }

    @media (max-width: 576px) {
        .daftar-ekskul-image,
        .daftar-ekskul-placeholder {
            height: 200px;
        }
    }
</style>

<section class="daftar-ekskul-section">
    <div class="container">

        {{-- Tombol Kembali --}}
        <a href="{{ route('landing') }}#ekskul"
           class="btn btn-outline-primary daftar-ekskul-back mb-4">
            <i class="bi bi-arrow-left me-2"></i>
            Kembali ke Beranda
        </a>

        {{-- Judul Halaman --}}
        <div class="text-center mb-5">
            <h2 class="daftar-ekskul-title">
                Semua Ekstrakurikuler
            </h2>

            <p class="daftar-ekskul-subtitle">
                Kenali berbagai kegiatan ekstrakurikuler
                di SMA Negeri 5 Tasikmalaya
            </p>

            <span class="badge rounded-pill px-3 py-2"
                  style="background:#e1f3ff;color:#0066a1;">
                <i class="bi bi-stars me-1"></i>
                Total {{ $ekskul->count() }} Ekstrakurikuler
            </span>
        </div>

        {{-- Daftar Ekskul --}}
        <div class="row g-4">
            @forelse($ekskul as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="daftar-ekskul-card">

                        {{-- Gambar --}}
                        @if($item->gambar)
                            <a href="{{ route('landing.ekskul.detail', $item->id_ekskul) }}">
                                <img
                                    src="{{ asset('storage/' . $item->gambar) }}"
                                    class="daftar-ekskul-image"
                                    alt="{{ $item->nama_ekskul }}"
                                >
                            </a>
                        @else
                            <div class="daftar-ekskul-placeholder">
                                <i class="bi bi-stars"></i>
                            </div>
                        @endif

                        <div class="p-4">

                            {{-- Nama Ekskul --}}
                            <h5 class="daftar-ekskul-name mb-3">
                                <a href="{{ route('landing.ekskul.detail', $item->id_ekskul) }}"
                                   class="text-decoration-none"
                                   style="color:inherit;">
                                    {{ $item->nama_ekskul }}
                                </a>
                            </h5>

                            {{-- Pembina --}}
                            <div class="daftar-ekskul-info mb-2">
                                <i class="bi bi-person-fill me-2"></i>
                                <strong>Pembina:</strong>
                                {{ $item->pembina ?: '-' }}
                            </div>

                            {{-- Jadwal --}}
                            <div class="daftar-ekskul-info mb-3">
                                <i class="bi bi-calendar-event me-2"></i>
                                <strong>Jadwal:</strong>
                                {{ $item->jadwal_latihan ?: '-' }}
                            </div>

                            {{-- Deskripsi --}}
                            <p class="daftar-ekskul-description mb-3">
                                {{ \Illuminate\Support\Str::limit(
                                    strip_tags($item->deskripsi), 110
                                ) }}
                            </p>

                            {{-- Detail --}}
                            <a href="{{ route('landing.ekskul.detail', $item->id_ekskul) }}"
                               class="btn btn-primary w-100">
                                Lihat Detail
                                <i class="bi bi-arrow-right ms-2"></i>
                            </a>

                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-stars"
                       style="font-size:55px;color:#8ed8ff;"></i>

                    <h5 class="mt-3">Belum Ada Ekstrakurikuler</h5>

                    <p class="text-muted">
                        Data ekstrakurikuler sekolah akan tampil di sini.
                    </p>
                </div>
            @endforelse
        </div>

    </div>
</section>

@endsection
