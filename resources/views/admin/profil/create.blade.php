@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="card shadow border-0">

        <div class="card-header bg-danger text-white">
            <h4 class="mb-0">
                <i class="bi bi-building"></i>
                Tambah Profil Sekolah
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

            <form action="{{ route('profil.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Nama Sekolah
                        </label>
                        <input type="text"
                               name="nama_sekolah"
                               class="form-control"
                               required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Kepala Sekolah
                        </label>
                        <input type="text"
                               name="kepala_sekolah"
                               class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            NPSN
                        </label>
                        <input type="text"
                               name="npsn"
                               class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Tahun Berdiri
                        </label>
                        <input type="number"
                               name="tahun_berdiri"
                               class="form-control">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">
                            Alamat
                        </label>
                        <textarea name="alamat"
                                  rows="3"
                                  class="form-control"></textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">
                            Visi Misi
                        </label>
                        <textarea name="visi_misi"
                                  rows="5"
                                  class="form-control"></textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">
                            Deskripsi
                        </label>
                        <textarea name="deskripsi"
                                  rows="4"
                                  class="form-control"></textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Logo Sekolah
                        </label>
                        <input type="file"
                               name="logo"
                               class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Foto Kepala Sekolah
                        </label>
                        <input type="file"
                               name="foto"
                               class="form-control">
                    </div>

                </div>

                <button type="submit"
                        class="btn btn-danger">
                    <i class="bi bi-save"></i>
                    Simpan
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
