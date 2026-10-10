@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="card shadow">
        <div class="card-header bg-danger text-white">
            <h4>Tambah Ekstrakulikuler</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('ekskul.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Ekskul</label>
                    <input type="text"
                           name="nama_ekskul"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Pembina</label>
                    <input type="text"
                           name="pembina"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Jadwal Latihan</label>
                    <input type="text"
                           name="jadwal_latihan"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi"
                              rows="4"
                              class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gambar</label>
                    <input type="file"
                           name="gambar"
                           class="form-control">
                </div>

                <button type="submit"
                        class="btn btn-danger">
                    Simpan
                </button>

                <a href="{{ route('ekskul.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>

</div>

@endsection
