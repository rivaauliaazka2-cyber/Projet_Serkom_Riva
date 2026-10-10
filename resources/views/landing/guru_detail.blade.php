@extends('layouts.landing')

@section('title', $guru->nama_guru . ' - SMA Negeri 5 Tasikmalaya')

@push('styles')
<style>
    .guru-detail-page {
        font-family: Arial, sans-serif;
        background: #f5f9ff;
        color: #1f2937;
        padding: 55px 0 75px;
        min-height: 70vh;
    }

    .guru-detail-page .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        color: #0066a1;
        text-decoration: none;
        font-weight: 600;
        margin-bottom: 22px;
    }

    .guru-detail-page .back-btn:hover {
        color: #004d7a;
    }

    .guru-detail-page .guru-card {
        background: #fff;
        border: 1px solid #e3eef6;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 12px 35px rgba(0, 76, 122, .09);
    }

    .guru-detail-page .guru-top {
        background: linear-gradient(135deg, #eaf6ff, #f8fcff);
        padding: 35px 25px;
        text-align: center;
    }

    .guru-detail-page .guru-image {
        width: 230px;
        height: 290px;
        object-fit: cover;
        object-position: center top;
        border-radius: 18px;
        box-shadow: 0 8px 25px rgba(0, 76, 122, .15);
    }

    .guru-detail-page .guru-placeholder {
        width: 230px;
        height: 290px;
        margin: auto;
        border-radius: 18px;
        background: linear-gradient(135deg, #0066a1, #8ed8ff);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 75px;
        box-shadow: 0 8px 25px rgba(0, 76, 122, .15);
    }

    .guru-detail-page .guru-content {
        padding: 42px 55px 48px;
    }

    .guru-detail-page .guru-name {
        color: #005b8f;
        font-size: 38px;
        font-weight: 800;
        line-height: 1.25;
        margin-bottom: 5px;
        overflow-wrap: anywhere;
    }

    .guru-detail-page .guru-role {
        color: #6b7280;
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .guru-detail-page .guru-line {
        width: 65px;
        height: 4px;
        background: #65c5f5;
        border-radius: 10px;
        margin: 20px 0 25px;
    }

    .guru-detail-page .info-list {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 15px;
    }

    .guru-detail-page .info-item {
        padding: 16px 18px;
        border-radius: 16px;
        background: #f5faff;
        border: 1px solid #dceef8;
        min-width: 0;
    }

    .guru-detail-page .info-icon {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        background: #0066a1;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
        margin-bottom: 10px;
    }

    .guru-detail-page .info-label {
        color: #6b7280;
        font-size: 13px;
        margin-bottom: 3px;
    }

    .guru-detail-page .info-value {
        color: #1f2937;
        font-size: 16px;
        font-weight: 700;
        overflow-wrap: anywhere;
    }

    .guru-detail-page .school-box {
        margin-top: 30px;
        padding: 18px 20px;
        border-radius: 16px;
        background: #f5faff;
        border: 1px solid #dceef8;
        display: flex;
        align-items: center;
        gap: 13px;
        color: #4b5563;
    }

    .guru-detail-page .school-icon {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        background: #0066a1;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
        flex-shrink: 0;
    }

    @media(max-width:768px) {
        .guru-detail-page {
            padding: 35px 0 55px;
        }

        .guru-detail-page .guru-top {
            padding: 22px 18px;
        }

        .guru-detail-page .guru-image,
        .guru-detail-page .guru-placeholder {
            width: 200px;
            height: 255px;
        }

        .guru-detail-page .guru-content {
            padding: 28px 22px 35px;
        }

        .guru-detail-page .guru-name {
            font-size: 28px;
        }

        .guru-detail-page .info-list {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')

<section class="guru-detail-page">
    <div class="container">

        <a href="{{ route('landing') }}#guru" class="back-btn">
            <i class="bi bi-arrow-left"></i>
            Kembali ke Guru
        </a>

        <div class="guru-card">

            {{-- FOTO GURU --}}
            <div class="guru-top">

                @if($guru->foto)
                    <img
                        src="{{ asset('storage/' . $guru->foto) }}"
                        class="guru-image"
                        alt="Foto {{ $guru->nama_guru }}"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                    >

                    <div class="guru-placeholder" style="display:none;">
                        <i class="bi bi-person-fill"></i>
                    </div>
                @else
                    <div class="guru-placeholder">
                        <i class="bi bi-person-fill"></i>
                    </div>
                @endif

            </div>

            {{-- DATA GURU --}}
            <div class="guru-content">

                <h1 class="guru-name">
                    {{ $guru->nama_guru }}
                </h1>

                <div class="guru-role">
                    {{ $guru->jabatan ?: 'Guru' }}
                </div>

                <div class="guru-line"></div>

                <div class="info-list">

                    {{-- NIP --}}
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="bi bi-person-badge"></i>
                        </div>

                        <div class="info-label">NIP</div>

                        <div class="info-value">
                            {{ $guru->nip ?: '-' }}
                        </div>
                    </div>

                    {{-- MATA PELAJARAN --}}
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="bi bi-book"></i>
                        </div>

                        <div class="info-label">Mata Pelajaran</div>

                        <div class="info-value">
                            {{ $guru->mapel ?: '-' }}
                        </div>
                    </div>

                    {{-- JABATAN --}}
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="bi bi-person-workspace"></i>
                        </div>

                        <div class="info-label">Jabatan</div>

                        <div class="info-value">
                            {{ $guru->jabatan ?: 'Guru' }}
                        </div>
                    </div>

                    {{-- SEKOLAH --}}
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="bi bi-mortarboard-fill"></i>
                        </div>

                        <div class="info-label">Sekolah</div>

                        <div class="info-value">
                            SMA Negeri 5 Tasikmalaya
                        </div>
                    </div>

                </div>

                {{-- INFORMASI SEKOLAH --}}
                <div class="school-box">

                    <div class="school-icon">
                        <i class="bi bi-building"></i>
                    </div>

                    <div>
                        <div class="fw-bold text-dark">
                            SMA Negeri 5 Tasikmalaya
                        </div>

                        <small>
                            Guru dan tenaga pendidik SMA Negeri 5 Tasikmalaya.
                        </small>
                    </div>

                </div>

                <div class="mt-4">
                    <a
                        href="{{ route('landing.daftar.guru') }}"
                        class="btn btn-outline-primary"
                    >
                        <i class="bi bi-people me-1"></i>
                        Lihat Semua Guru
                    </a>
                </div>

            </div>
        </div>

    </div>
</section>

@endsection
