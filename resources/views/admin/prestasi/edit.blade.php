@extends('layouts.admin')

@section('content')

<div class="container">

    <h3>Edit Prestasi</h3>

    <form action="{{ route('prestasi.update',$prestasi->id_prestasi) }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Prestasi</label>
            <input type="text"
                name="nama_prestasi"
                value="{{ $prestasi->nama_prestasi }}"
                class="form-control">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi"
                rows="4"
                class="form-control">{{ $prestasi->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label>Tahun Ajaran</label>
            <input type="text"
                name="tahun_ajaran"
                value="{{ $prestasi->tahun_ajaran }}"
                class="form-control">
        </div>

        <div class="mb-3">

            <label>Foto</label>

            @if($prestasi->foto)
            <br>
            <img src="{{ asset('uploads/prestasi/'.$prestasi->foto) }}"
                width="120"
                class="mb-2">
            @endif

            <input type="file"
                name="foto"
                class="form-control">

        </div>

        <button class="btn btn-primary">
            Update
        </button>

        <a href="{{ route('prestasi.index') }}"
            class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

@endsection
