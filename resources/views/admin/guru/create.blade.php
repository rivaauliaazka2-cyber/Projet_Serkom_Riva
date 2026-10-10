@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="card shadow border-0">
        <div class="card-header bg-danger text-white">
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

        <form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Guru</label>
                <input type="text" name="nama_guru" class="form-control" value="{{ old('nama_guru') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">NIP</label>
                <input type="text" name="nip" class="form-control" value="{{ old('nip') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Mata Pelajaran</label>
                <select name="mapel" class="form-select">
                    <option value="">-- Pilih Mata Pelajaran --</option>

                    <option value="Pendidikan Agama Islam" {{ old('mapel') == 'Pendidikan Agama Islam' ? 'selected' : '' }}>
                        Pendidikan Agama Islam
                    </option>

                    <option value="PPKn" {{ old('mapel') == 'PPKn' ? 'selected' : '' }}>
                        PPKn
                    </option>

                    <option value="Bahasa Indonesia" {{ old('mapel') == 'Bahasa Indonesia' ? 'selected' : '' }}>
                        Bahasa Indonesia
                    </option>

                    <option value="Bahasa Inggris" {{ old('mapel') == 'Bahasa Inggris' ? 'selected' : '' }}>
                        Bahasa Inggris
                    </option>

                    <option value="Matematika" {{ old('mapel') == 'Matematika' ? 'selected' : '' }}>
                        Matematika
                    </option>

                    <option value="Fisika" {{ old('mapel') == 'Fisika' ? 'selected' : '' }}>
                        Fisika
                    </option>

                    <option value="Kimia" {{ old('mapel') == 'Kimia' ? 'selected' : '' }}>
                        Kimia
                    </option>

                    <option value="Biologi" {{ old('mapel') == 'Biologi' ? 'selected' : '' }}>
                        Biologi
                    </option>

                    <option value="Sejarah" {{ old('mapel') == 'Sejarah' ? 'selected' : '' }}>
                        Sejarah
                    </option>

                    <option value="Geografi" {{ old('mapel') == 'Geografi' ? 'selected' : '' }}>
                        Geografi
                    </option>

                    <option value="Sosiologi" {{ old('mapel') == 'Sosiologi' ? 'selected' : '' }}>
                        Sosiologi
                    </option>

                    <option value="Ekonomi" {{ old('mapel') == 'Ekonomi' ? 'selected' : '' }}>
                        Ekonomi
                    </option>

                    <option value="Informatika" {{ old('mapel') == 'Informatika' ? 'selected' : '' }}>
                        Informatika
                    </option>

                    <option value="PJOK" {{ old('mapel') == 'PJOK' ? 'selected' : '' }}>
                        PJOK
                    </option>

                    <option value="Seni Budaya" {{ old('mapel') == 'Seni Budaya' ? 'selected' : '' }}>
                        Seni Budaya
                    </option>

                    <option value="Bahasa Sunda" {{ old('mapel') == 'Bahasa Sunda' ? 'selected' : '' }}>
                        Bahasa Sunda
                    </option>

                    <option value="Bahasa Jepang" {{ old('mapel') == 'Bahasa Jepang' ? 'selected' : '' }}>
                        Bahasa Jepang
                    </option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Jabatan</label>
                <select name="jabatan" class="form-select">
                    <option value="">-- Pilih Jabatan --</option>

                    <option value="Kepala Sekolah">Kepala Sekolah</option>

                    <option value="Wakasek Kurikulum">Wakasek Kurikulum</option>
                    <option value="Wakasek Kesiswaan">Wakasek Kesiswaan</option>
                    <option value="Wakasek Sarana dan Prasarana">Wakasek Sarana dan Prasarana</option>
                    <option value="Wakasek Hubungan Masyarakat">Wakasek Hubungan Masyarakat</option>

                    <option value="Kepala Tata Usaha">Kepala Tata Usaha</option>
                    <option value="Kepala Perpustakaan">Kepala Perpustakaan</option>
                    <option value="Kepala Laboratorium">Kepala Laboratorium</option>

                    <option value="Guru Mata Pelajaran">Guru Mata Pelajaran</option>
                    <option value="Guru BK">Guru BK</option>
                    <option value="Wali Kelas">Wali Kelas</option>

                    <option value="Pembina OSIS">Pembina OSIS</option>
                    <option value="Pembina Ekstrakurikuler">Pembina Ekstrakurikuler</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Foto Guru</label>
                <input type="file" name="foto" class="form-control" accept="image/*">
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Simpan
                </button>

                <a href="{{ route('guru.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
</div>
@endsection
