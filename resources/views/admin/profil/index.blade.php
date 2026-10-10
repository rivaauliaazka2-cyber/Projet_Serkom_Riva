@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($profil)

    <div class="d-flex justify-content-end mb-3">
        @if(auth()->user()->role == 'Admin')
            <a href="{{ route('profil.edit', $profil->id_profil) }}"
            class="btn btn-primary">
                <i class="bi bi-pencil-square"></i> Edit Profil
            </a>
        @endif
    </div>

    <div class="card shadow border-0 mb-4">

        @if($profil->logo)
            <div class="text-center mt-4">
                <img src="{{ asset('uploads/profil/'.$profil->logo) }}" width="120">
            </div>
        @endif

        <div class="card-body text-center">

            <h2 class="text-primary fw-bold">
                {{ $profil->nama_sekolah }}
            </h2>

            <p class="text-muted">
                {{ $profil->deskripsi }}
            </p>

        </div>

    </div>

    <div class="row">

        <div class="col-lg-4">

            <div class="card shadow border-0 mb-4">

                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Identitas Sekolah</h5>
                </div>

                <div class="card-body">

                    <table class="table">
                        <tr>
                            <th>NPSN</th>
                            <td>{{ $profil->npsn }}</td>
                        </tr>

                        <tr>
                            <th>Kepala Sekolah</th>
                            <td>{{ $profil->kepala_sekolah }}</td>
                        </tr>

                        <tr>
                            <th>Tahun Berdiri</th>
                            <td>{{ $profil->tahun_berdiri }}</td>
                        </tr>

                        <tr>
                            <th>Alamat</th>
                            <td>{{ $profil->alamat }}</td>
                        </tr>
                    </table>

                </div>

            </div>

        </div>

        <div class="col-lg-8">

            <div class="card shadow border-0 mb-4">

                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Visi Misi</h5>
                </div>

                <div class="card-body">
                    {!! nl2br(e($profil->visi_misi)) !!}
                </div>

            </div>

        </div>

    </div>

    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Kepala Sekolah</h5>
        </div>

        <div class="card-body text-center">

            @if($profil->foto)
                <img src="{{ asset('uploads/profil/'.$profil->foto) }}"
                     width="180"
                     class="rounded-circle mb-3">
            @endif

            <h5>{{ $profil->kepala_sekolah }}</h5>

        </div>

    </div>

    @else

    <div class="card shadow border-0">
        <div class="card-body text-center py-5">

            <i class="bi bi-building fs-1 text-muted"></i>

            <h4 class="mt-3">
                Data Profil Sekolah Belum Ada
            </h4>

            <p class="text-muted">
                Tambahkan data profil sekolah terlebih dahulu.
            </p>

            <a href="{{ route('profil.create') }}"
               class="btn btn-success">
                <i class="bi bi-plus-circle"></i>
                Tambah Profil Sekolah
            </a>

        </div>
    </div>

    @endif

</div>

@endsection
