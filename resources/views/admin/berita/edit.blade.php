@extends('layouts.admin')

@section('content')
<div class="container">

    <h3>Edit Berita</h3>

    <form action="{{ route('berita.update',$berita->id_berita) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Judul</label>

            <input type="text"
                   name="judul"
                   value="{{ $berita->judul }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Isi</label>

            <textarea name="isi"
                      class="form-control"
                      rows="5">{{ $berita->isi }}</textarea>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>

            <input type="date"
                   name="tanggal"
                   value="{{ $berita->tanggal }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Status</label>

            <select name="status"
                    class="form-control">

                <option value="Publish"
                    {{ $berita->status == 'Publish' ? 'selected' : '' }}>
                    Publish
                </option>

                <option value="Draft"
                    {{ $berita->status == 'Draft' ? 'selected' : '' }}>
                    Draft
                </option>

            </select>
        </div>

        <div class="mb-3">
            <label>Gambar Baru</label>

            <input type="file"
                   name="gambar"
                   class="form-control">
        </div>

        <a href="{{ route('berita.index') }}" class="btn btn-secondary">
            Kembali
        </a>

        <button class="btn btn-primary">
            Update
        </button>

    </form>

</div>
@endsection
