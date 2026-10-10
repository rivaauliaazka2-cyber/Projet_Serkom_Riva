@extends('layouts.admin')

@section('content')

<div class="container">

    <h3>Tambah Pengumuman</h3>

    <form action="{{ route('pengumuman.store') }}"
          method="POST">

        @csrf

        <div class="mb-3">
            <label class="form-label">
                Judul
            </label>

            <input type="text"
                   name="judul"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">
                Isi Pengumuman
            </label>

            <textarea name="isi"
                      rows="5"
                      class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">
                Tanggal
            </label>

            <input type="date"
                   name="tanggal"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">
                Status
            </label>

            <select name="status"
                    class="form-control">

                <option value="Publish">
                    Publish
                </option>

                <option value="Draft">
                    Draft
                </option>

            </select>
        </div>

        <button class="btn btn-primary">
            Simpan
        </button>

        <a href="{{ route('pengumuman.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

@endsection
