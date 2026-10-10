@extends('layouts.admin')

@section('content')

<div class="container">

    <h3>Edit Galeri</h3>

    <form action="{{ route('galeri.update',$galeri->id_galeri) }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Judul</label>

            <input type="text"
                name="judul"
                value="{{ $galeri->judul }}"
                class="form-control">
        </div>

        <div class="mb-3">
            <label>Keterangan</label>

            <textarea name="keterangan"
                class="form-control">{{ $galeri->keterangan }}</textarea>
        </div>

        <div class="mb-3">
            <label>Kategori</label>

            <select name="kategori"
                class="form-control">

                <option value="Foto"
                    {{ $galeri->kategori=='Foto' ? 'selected' : '' }}>
                    Foto
                </option>

                <option value="Video"
                    {{ $galeri->kategori=='Video' ? 'selected' : '' }}>
                    Video
                </option>

            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>

            <input type="date"
                name="tanggal"
                value="{{ $galeri->tanggal }}"
                class="form-control">
        </div>

        <div class="mb-3">

            <label>File</label>

            @if($galeri->file)

            <br>

            <img src="{{ asset('uploads/galeri/'.$galeri->file) }}"
                width="120"
                class="mb-2">

            @endif

            <input type="file"
                name="file"
                class="form-control">

        </div>

        <button class="btn btn-primary">
            Update
        </button>

        <a href="{{ route('galeri.index') }}"
            class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

@endsection
