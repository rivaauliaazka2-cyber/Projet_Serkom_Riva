@extends('layouts.landing')

@section('content')

{{-- ================= HEADER TENTANG ================= --}}
<section class="py-5" style="background:#f5f9ff;">
    <div class="container">
        <div class="text-center py-4">
            <span class="badge rounded-pill px-3 py-2 mb-3"
                  style="background:#dff2ff;color:#0066a1;">
                PROFIL SEKOLAH
            </span>

            <h1 class="fw-bold mb-3" style="color:#0066a1;">
                Tentang SMA Negeri 5 Tasikmalaya
            </h1>

            <p class="text-muted mx-auto" style="max-width:700px;line-height:1.8;">
                Mengenal lebih dekat identitas, visi, dan misi
                SMA Negeri 5 Tasikmalaya sebagai bagian dari
                komitmen dalam dunia pendidikan.
            </p>
        </div>
    </div>
</section>
{{-- ================= IDENTITAS SEKOLAH ================= --}}
<section class="py-5 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-body p-4 p-md-5">
                        <div class="text-center mb-4">
                            <img
                                src="{{ asset('assets/images/logosma-removebg-preview.png') }}"
                                alt="Logo SMA Negeri 5 Tasikmalaya"
                                style="width:110px;height:110px;object-fit:contain;"
                                class="mb-3"
                            >
                            <h2 class="fw-bold" style="color:#0066a1;">
                                {{ $profil->nama_sekolah ?? 'SMA NEGERI 5 TASIKMALAYA' }}
                            </h2>

                            <p class="text-muted mb-0">
                                Identitas Resmi Sekolah
                            </p>
                        </div>
                        <hr class="my-4">

                        <h4 class="fw-bold mb-4" style="color:#0066a1;">
                            <i class="bi bi-building me-2"></i>
                            Identitas Sekolah
                        </h4>
                        <div class="table-responsive">
                            <table class="table table-borderless align-middle mb-0">
                                <tbody>
                                    <tr>
                                        <th style="width:35%;">Nama Sekolah</th>
                                        <td>
                                            {{ $profil->nama_sekolah ?? 'SMA Negeri 5 Tasikmalaya' }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>NPSN</th>
                                        <td>{{ $profil->npsn ?? '-' }}</td>
                                    </tr>

                                    <tr>
                                        <th>Kepala Sekolah</th>
                                        <td>{{ $profil->kepala_sekolah ?? '-' }}</td>
                                    </tr>

                                    <tr>
                                        <th>Tahun Berdiri</th>
                                        <td>{{ $profil->tahun_berdiri ?? '-' }}</td>
                                    </tr>

                                    <tr>
                                        <th>Alamat Sekolah</th>
                                        <td>{{ $profil->alamat ?? '-' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
{{-- ================= VISI DAN MISI ================= --}}
<section class="py-5" style="background:#f5f9ff;">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold" style="color:#0066a1;">
                Visi dan Misi
            </h2>
            <p class="text-muted">
                Arah dan tujuan pendidikan SMA Negeri 5 Tasikmalaya
            </p>
        </div>
        @php
            $visiMisi = trim($profil->visi_misi ?? '');
            $bagian = preg_split(
                '/\bMisi\s*:/i',
                $visiMisi,
                2
            );
            $visi = preg_replace(
                '/^\s*Visi\s*:/i',
                '',
                trim($bagian[0] ?? '')
            );
            $misi = trim($bagian[1] ?? '');
        @endphp
        <div class="row g-4">
            {{-- VISI --}}
            <div class="col-lg-6">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 p-md-5">
                        <div class="d-flex align-items-center mb-4">
                            <div class="rounded-3 d-flex align-items-center
                                        justify-content-center me-3"
                                 style="width:55px;height:55px;
                                        background:#e1f3ff;color:#0066a1;">
                                <i class="bi bi-eye-fill fs-3"></i>
                            </div>

                            <h3 class="fw-bold mb-0"
                                style="color:#0066a1;">
                                Visi
                            </h3>
                        </div>

                        @if($visiMisi)
                            <p class="text-muted mb-0"
                               style="line-height:1.9;white-space:pre-line;">
                                {{ $visi ?: $visiMisi }}
                            </p>
                        @else
                            <p class="text-muted mb-0">
                                Informasi visi sekolah belum tersedia.
                            </p>
                        @endif

                    </div>
                </div>
            </div>
            {{-- MISI --}}
            <div class="col-lg-6">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 p-md-5">

                        <div class="d-flex align-items-center mb-4">
                            <div class="rounded-3 d-flex align-items-center
                                        justify-content-center me-3"
                                 style="width:55px;height:55px;
                                        background:#e1f3ff;color:#0066a1;">
                                <i class="bi bi-bullseye fs-3"></i>
                            </div>

                            <h3 class="fw-bold mb-0"
                                style="color:#0066a1;">
                                Misi
                            </h3>
                        </div>
                        @if($misi)
                            <div class="text-muted"
                                 style="line-height:1.9;white-space:pre-line;">
                                {{ trim($misi) }}
                            </div>
                        @else
                            <p class="text-muted mb-0">
                                Informasi misi sekolah belum tersedia.
                            </p>
                        @endif

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
{{-- ================= KEMBALI ================= --}}
<section class="py-4 bg-white">
    <div class="container text-center">
        <a href="{{ route('landing') }}#profil"
           class="btn btn-outline-primary rounded-pill px-4 py-3">
            <i class="bi bi-arrow-left me-2"></i>
            Kembali ke Beranda
        </a>
    </div>
</section>
@endsection
