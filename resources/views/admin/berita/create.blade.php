
@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card border-0 shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Tambah Berita</h4>
                </div>

                <div class="card-body">

                    {{-- Pesan error validasi --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Data gagal disimpan!</strong>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('berita.store') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Judul Berita
                            </label>
                            <input type="text"
                                   name="judul"
                                   class="form-control"
                                   value="{{ old('judul') }}"
                                   placeholder="Masukkan judul berita"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Isi Berita
                            </label>
                            <textarea name="isi"
                                      rows="5"
                                      class="form-control"
                                      placeholder="Masukkan isi berita"
                                      required>{{ old('isi') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Tanggal
                            </label>
                            <input type="date"
                                   name="tanggal"
                                   class="form-control"
                                   value="{{ old('tanggal', date('Y-m-d')) }}"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Status
                            </label>
                            <select name="status"
                                    class="form-select"
                                    required>
                                <option value="">-- Pilih Status --</option>
                                <option value="Publish"
                                    {{ old('status') == 'Publish' ? 'selected' : '' }}>
                                    Publish
                                </option>
                                <option value="Draft"
                                    {{ old('status') == 'Draft' ? 'selected' : '' }}>
                                    Draft
                                </option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">
                                Upload Gambar
                            </label>
                            <input type="file"
                                   name="gambar"
                                   class="form-control"
                                   accept="image/*">
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Simpan
                            </button>

                            <a href="{{ route('berita.index') }}"
                               class="btn btn-secondary">
                                Kembali
                            </a>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
