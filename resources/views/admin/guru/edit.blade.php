@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="card shadow border-0">
        <div class="card-header bg-warning">
            <h4 class="mb-0">
                <i class="bi bi-pencil-square"></i>
                Edit Data Guru
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

        <form action="{{ route('guru.update', $guru->id_guru) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama Guru</label>
                <input type="text" name="nama_guru" class="form-control" value="{{ old('nama_guru', $guru->nama_guru) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">NIP</label>
                <input type="text" name="nip" class="form-control" value="{{ old('nip', $guru->nip) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Mata Pelajaran</label>
                <select name="mapel" class="form-select">
                    <option value="">-- Pilih Mata Pelajaran --</option>

                    <option value="Pendidikan Agama Islam" {{ old('mapel', $guru->mapel) == 'Pendidikan Agama Islam' ? 'selected' : '' }}>
                        Pendidikan Agama Islam
                    </option>

                    <option value="PPKn" {{ old('mapel', $guru->mapel) == 'PPKn' ? 'selected' : '' }}>
                        PPKn
                    </option>

                    <option value="Bahasa Indonesia" {{ old('mapel', $guru->mapel) == 'Bahasa Indonesia' ? 'selected' : '' }}>
                        Bahasa Indonesia
                    </option>

                    <option value="Bahasa Inggris" {{ old('mapel', $guru->mapel) == 'Bahasa Inggris' ? 'selected' : '' }}>
                        Bahasa Inggris
                    </option>

                    <option value="Matematika" {{ old('mapel', $guru->mapel) == 'Matematika' ? 'selected' : '' }}>
                        Matematika
                    </option>

                    <option value="Fisika" {{ old('mapel', $guru->mapel) == 'Fisika' ? 'selected' : '' }}>
                        Fisika
                    </option>

                    <option value="Kimia" {{ old('mapel', $guru->mapel) == 'Kimia' ? 'selected' : '' }}>
                        Kimia
                    </option>

                    <option value="Biologi" {{ old('mapel', $guru->mapel) == 'Biologi' ? 'selected' : '' }}>
                        Biologi
                    </option>

                    <option value="Sejarah" {{ old('mapel', $guru->mapel) == 'Sejarah' ? 'selected' : '' }}>
                        Sejarah
                    </option>

                    <option value="Geografi" {{ old('mapel', $guru->mapel) == 'Geografi' ? 'selected' : '' }}>
                        Geografi
                    </option>

                    <option value="Sosiologi" {{ old('mapel', $guru->mapel) == 'Sosiologi' ? 'selected' : '' }}>
                        Sosiologi
                    </option>

                    <option value="Ekonomi" {{ old('mapel', $guru->mapel) == 'Ekonomi' ? 'selected' : '' }}>
                        Ekonomi
                    </option>

                    <option value="Informatika" {{ old('mapel', $guru->mapel) == 'Informatika' ? 'selected' : '' }}>
                        Informatika
                    </option>

                    <option value="PJOK" {{ old('mapel', $guru->mapel) == 'PJOK' ? 'selected' : '' }}>
                        PJOK
                    </option>

                    <option value="Seni Budaya" {{ old('mapel', $guru->mapel) == 'Seni Budaya' ? 'selected' : '' }}>
                        Seni Budaya
                    </option>

                    <option value="Bahasa Sunda" {{ old('mapel', $guru->mapel) == 'Bahasa Sunda' ? 'selected' : '' }}>
                        Bahasa Sunda
                    </option>

                    <option value="Bahasa Jepang" {{ old('mapel', $guru->mapel) == 'Bahasa Jepang' ? 'selected' : '' }}>
                        Bahasa Jepang
                    </option>
                </select>
            </div>

           <div class="mb-3">
                <label class="form-label">Jabatan</label>
                <select name="jabatan" class="form-select">
                    <option value="">-- Pilih Jabatan --</option>

                    <option value="Kepala Sekolah"
                        {{ old('jabatan', $guru->jabatan) == 'Kepala Sekolah' ? 'selected' : '' }}>
                        Kepala Sekolah
                    </option>

                    <option value="Wakasek Kurikulum"
                        {{ old('jabatan', $guru->jabatan) == 'Wakasek Kurikulum' ? 'selected' : '' }}>
                        Wakasek Kurikulum
                    </option>

                    <option value="Wakasek Kesiswaan"
                        {{ old('jabatan', $guru->jabatan) == 'Wakasek Kesiswaan' ? 'selected' : '' }}>
                        Wakasek Kesiswaan
                    </option>

                    <option value="Wakasek Sarana dan Prasarana"
                        {{ old('jabatan', $guru->jabatan) == 'Wakasek Sarana dan Prasarana' ? 'selected' : '' }}>
                        Wakasek Sarana dan Prasarana
                    </option>

                    <option value="Wakasek Hubungan Masyarakat"
                        {{ old('jabatan', $guru->jabatan) == 'Wakasek Hubungan Masyarakat' ? 'selected' : '' }}>
                        Wakasek Hubungan Masyarakat
                    </option>

                    <option value="Kepala Tata Usaha"
                        {{ old('jabatan', $guru->jabatan) == 'Kepala Tata Usaha' ? 'selected' : '' }}>
                        Kepala Tata Usaha
                    </option>

                    <option value="Kepala Perpustakaan"
                        {{ old('jabatan', $guru->jabatan) == 'Kepala Perpustakaan' ? 'selected' : '' }}>
                        Kepala Perpustakaan
                    </option>

                    <option value="Kepala Laboratorium"
                        {{ old('jabatan', $guru->jabatan) == 'Kepala Laboratorium' ? 'selected' : '' }}>
                        Kepala Laboratorium
                    </option>

                    <option value="Guru Mata Pelajaran"
                        {{ old('jabatan', $guru->jabatan) == 'Guru Mata Pelajaran' ? 'selected' : '' }}>
                        Guru Mata Pelajaran
                    </option>

                    <option value="Guru BK"
                        {{ old('jabatan', $guru->jabatan) == 'Guru BK' ? 'selected' : '' }}>
                        Guru BK
                    </option>

                    <option value="Wali Kelas"
                        {{ old('jabatan', $guru->jabatan) == 'Wali Kelas' ? 'selected' : '' }}>
                        Wali Kelas
                    </option>

                    <option value="Pembina OSIS"
                        {{ old('jabatan', $guru->jabatan) == 'Pembina OSIS' ? 'selected' : '' }}>
                        Pembina OSIS
                    </option>

                    <option value="Pembina Ekstrakurikuler"
                        {{ old('jabatan', $guru->jabatan) == 'Pembina Ekstrakurikuler' ? 'selected' : '' }}>
                        Pembina Ekstrakurikuler
                    </option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Foto Guru</label>

                @if($guru->foto)
                    <div class="mb-2">
                        <img src="{{ asset('storage/'.$guru->foto) }}" width="120" class="img-thumbnail">
                    </div>
                @endif

                <input type="file" name="foto" class="form-control" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-circle"></i>
                Update
            </button>

            <a href="{{ route('guru.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </form>
    </div>
</div>

</div>
@endsection
