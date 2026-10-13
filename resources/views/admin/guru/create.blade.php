@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="card shadow border-0">

        <div class="card-header text-white" style="background-color: #0066a1;">
            <h4 class="mb-0">
                <i class="bi bi-person-plus-fill"></i>
                Tambah Data Guru
            </h4>
        </div>

        <div class="card-body">

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('guru.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                {{-- Nama Guru --}}
                <div class="mb-3">
                    <label class="form-label">Nama Guru</label>
                    <input type="text"
                           name="nama_guru"
                           class="form-control"
                           value="{{ old('nama_guru') }}"
                           maxlength="40"
                           required>
                </div>

                {{-- NIP --}}
                <div class="mb-3">
                    <label class="form-label">NIP</label>
                    <input type="text"
                           name="nip"
                           class="form-control"
                           value="{{ old('nip') }}"
                           maxlength="18">
                </div>

                {{-- Jabatan --}}
                <div class="mb-3">
                    <label class="form-label">Jabatan</label>

                    <select name="jabatan" id="jabatan" class="form-select" required>
                        <option value="">-- Pilih Jabatan --</option>

                        @foreach($jabatan as $item)
                            <option value="{{ $item->nama_jabatan }}"
                                {{ old('jabatan') == $item->nama_jabatan ? 'selected' : '' }}>
                                {{ $item->nama_jabatan }}
                            </option>
                        @endforeach
                    </select>
                </div>


                {{-- Mata Pelajaran --}}
                <div class="mb-3" id="mapel-container">
                    <label class="form-label">Mata Pelajaran</label>

                    <select name="mapel" id="mapel" class="form-select">
                        <option value="">Pilih Mata Pelajaran</option>

                        @foreach($mapel as $item)
                            <option value="{{ $item->nama_mapel }}"
                                {{ old('mapel') == $item->nama_mapel ? 'selected' : '' }}>
                                {{ $item->nama_mapel }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Foto Guru --}}
                <div class="mb-3">
                    <label class="form-label">Foto Guru</label>
                    <input type="file"
                           name="foto"
                           class="form-control"
                           accept="image/jpeg,image/png,image/webp">
                </div>

                {{-- Tombol --}}
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Simpan
                    </button>

                    <a href="{{ route('guru.index') }}"
                       class="btn btn-secondary">
                        Kembali
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const jabatan = document.getElementById('jabatan');
    const mapel = document.getElementById('mapel');
    const container = document.getElementById('mapel-container');

    function aturMapel() {
        const tanpaMapel = [
            'Kepala Sekolah',
            'Staff Tata Usaha',
        ];

        if (tanpaMapel.includes(jabatan.value)) {
            mapel.value = '';
            mapel.required = false;
            container.style.display = 'none';
        } else {
            container.style.display = 'block';
            mapel.required = jabatan.value !== '';
        }
    }

    jabatan.addEventListener('change', aturMapel);
    aturMapel();
});
</script>

@endsection
