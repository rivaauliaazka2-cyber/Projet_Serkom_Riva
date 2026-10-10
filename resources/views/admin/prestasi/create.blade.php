@extends('layouts.admin')

@section('content')

<div class="container">

    <h3>Tambah Prestasi</h3>

    <form action="{{ route('prestasi.store') }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf

        <div class="mb-3">
            <label>Nama Prestasi</label>
            <input type="text"
                name="nama_prestasi"
                class="form-control">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi"
                rows="4"
                class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Tahun Ajaran</label>
            <input type="text"
                name="tahun_ajaran"
                class="form-control"
                placeholder="2025/2026">
        </div>

        <div class="mb-3">
            <label>Foto</label>
            <input type="file"
                name="foto"
                class="form-control">
        </div>

        <button class="btn btn-primary">
            Simpan
        </button>

        <a href="{{ route('prestasi.index') }}"
            class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

@endsection
