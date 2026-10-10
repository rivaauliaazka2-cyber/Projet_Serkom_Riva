
@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">

            <h3 class="fw-bold mb-4">Tambah Galeri</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('galeri.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text"
                           name="judul"
                           class="form-control"
                           value="{{ old('judul') }}"
                           maxlength="50"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="keterangan"
                              class="form-control"
                              rows="3">{{ old('keterangan') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="kategori"
                            id="kategori"
                            class="form-select"
                            required>
                        <option value="">Pilih kategori</option>
                        <option value="Foto"
                            {{ old('kategori') == 'Foto' ? 'selected' : '' }}>
                            Foto
                        </option>
                        <option value="Video"
                            {{ old('kategori') == 'Video' ? 'selected' : '' }}>
                            Video
                        </option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date"
                           name="tanggal"
                           class="form-control"
                           value="{{ old('tanggal') }}"
                           required>
                </div>

                <div class="mb-4">
                    <label class="form-label">File Foto / Video</label>
                    <input type="file"
                           name="file"
                           id="file"
                           class="form-control"
                           accept="image/jpeg,image/png,image/webp,video/mp4,video/webm,video/ogg"
                           required>

                    <small id="petunjukFile" class="text-muted">
                        Pilih kategori terlebih dahulu.
                    </small>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Simpan
                </button>

                <a href="{{ route('galeri.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>
        </div>
    </div>
</div>

<script>
    const kategori = document.getElementById('kategori');
    const file = document.getElementById('file');
    const petunjuk = document.getElementById('petunjukFile');

    function aturFile() {
        if (kategori.value === 'Foto') {
            file.accept = 'image/jpeg,image/png,image/webp';
            petunjuk.textContent =
                'Format: JPG, JPEG, PNG, WEBP. Maksimal 10 MB.';
        } else if (kategori.value === 'Video') {
            file.accept = 'video/mp4,video/webm,video/ogg';
            petunjuk.textContent =
                'Format: MP4, WEBM, OGG. Maksimal 50 MB.';
        } else {
            file.accept =
                'image/jpeg,image/png,image/webp,video/mp4,video/webm,video/ogg';
            petunjuk.textContent =
                'Pilih kategori terlebih dahulu.';
        }
    }

    kategori.addEventListener('change', aturFile);
    aturFile();
</script>

@endsection
