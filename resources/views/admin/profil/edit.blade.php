@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white">
            <h4>
                <i class="bi bi-pencil-square"></i>
                Edit Profil Sekolah
            </h4>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('profil.update', $profil->id_profil) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">
                        Nama Sekolah
                    </label>

                    <input type="text"
                           name="nama_sekolah"
                           class="form-control"
                           value="{{ $profil->nama_sekolah }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Kepala Sekolah
                    </label>

                    <input type="text"
                           name="kepala_sekolah"
                           class="form-control"
                           value="{{ $profil->kepala_sekolah }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        NPSN
                    </label>

                    <input type="text"
                           name="npsn"
                           class="form-control"
                           value="{{ $profil->npsn }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Tahun Berdiri
                    </label>

                    <input type="number"
                           name="tahun_berdiri"
                           class="form-control"
                           value="{{ $profil->tahun_berdiri }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Alamat
                    </label>

                    <textarea name="alamat"
                              class="form-control"
                              rows="3">{{ $profil->alamat }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Visi Misi
                    </label>

                    <textarea name="visi_misi"
                              class="form-control"
                              rows="5">{{ $profil->visi_misi }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Deskripsi
                    </label>

                    <textarea name="deskripsi"
                              class="form-control"
                              rows="5">{{ $profil->deskripsi }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Logo Sekolah
                    </label>

                    <input type="file"
                           name="logo"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Foto Kepala Sekolah
                    </label>

                    <input type="file"
                           name="foto"
                           class="form-control">
                </div>

                <button type="submit"
                        class="btn btn-primary">
                    <i class="bi bi-check-circle"></i>
                    Update
                </button>

                <a href="{{ route('profil.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>

    </div>

</div>

@endsection
