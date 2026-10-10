@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="card shadow">
        <div class="card-header bg-warning">
            <h4>Edit Ekstrakulikuler</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('ekskul.update', $ekskul->id_ekskul) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Ekskul</label>
                    <input type="text"
                           name="nama_ekskul"
                           value="{{ $ekskul->nama_ekskul }}"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Pembina</label>
                    <input type="text"
                           name="pembina"
                           value="{{ $ekskul->pembina }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Jadwal Latihan</label>
                    <input type="text"
                           name="jadwal_latihan"
                           value="{{ $ekskul->jadwal_latihan }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi"
                              rows="4"
                              class="form-control">{{ $ekskul->deskripsi }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gambar Baru</label>
                    <input type="file"
                           name="gambar"
                           class="form-control">
                </div>

                @if($ekskul->gambar)
                    <div class="mb-3">
                        <img src="{{ asset('storage/'.$ekskul->gambar) }}"
                             width="120"
                             class="img-thumbnail">
                    </div>
                @endif

                <button type="submit" class="btn btn-primary">
                    Update
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
