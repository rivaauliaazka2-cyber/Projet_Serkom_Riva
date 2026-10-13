
@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card shadow border-0">
        <div class="card-header text-white" style="background-color: #0066a1;">
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

            <form action="{{ route('guru.update', $guru->id_guru) }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Nama Guru --}}
                <div class="mb-3">
                    <label class="form-label">Nama Guru</label>
                    <input type="text"
                           name="nama_guru"
                           class="form-control"
                           value="{{ old('nama_guru', $guru->nama_guru) }}"
                           maxlength="40"
                           required>
                </div>

                {{-- NIP --}}
                <div class="mb-3">
                    <label class="form-label">NIP</label>
                    <input type="text"
                           name="nip"
                           class="form-control"
                           value="{{ old('nip', $guru->nip) }}"
                           maxlength="18">
                </div>

                {{-- Jabatan --}}
                <div class="mb-3">
                    <label class="form-label">Jabatan</label>
                    <select name="jabatan"
                            id="jabatan"
                            class="form-select"
                            required>
                        <option value="">-- Pilih Jabatan --</option>

                        @foreach($jabatan as $item)
                            <option value="{{ $item->nama_jabatan }}"
                                {{ old('jabatan', $guru->jabatan) == $item->nama_jabatan ? 'selected' : '' }}>
                                {{ $item->nama_jabatan }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Mata Pelajaran --}}
                <div class="mb-3" id="mapel-container">
                    <label class="form-label">Mata Pelajaran</label>
                    <select name="mapel" id="mapel" class="form-select">
                        <option value="">-- Pilih Mata Pelajaran --</option>

                        @foreach($mapel as $item)
                            <option value="{{ $item->nama_mapel }}"
                                {{ old('mapel', $guru->mapel) == $item->nama_mapel ? 'selected' : '' }}>
                                {{ $item->nama_mapel }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Foto Guru --}}
                <div class="mb-3">
                    <label class="form-label">Foto Guru</label>

                    @if($guru->foto)
                        <div class="mb-2">
                            <img src="{{ asset('storage/'.$guru->foto) }}"
                                 width="120"
                                 class="img-thumbnail"
                                 alt="Foto {{ $guru->nama_guru }}">
                        </div>
                    @endif

                    <input type="file"
                           name="foto"
                           class="form-control"
                           accept="image/jpeg,image/png,image/webp">
                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengganti foto.
                    </small>
                </div>

                {{-- Tombol --}}
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-circle"></i> Update
                </button>

                <a href="{{ route('guru.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>
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
        const pilihan = jabatan.value.trim().toLowerCase();

        const tanpaMapel = [
            'kepala sekolah',
            'staff tata usaha',
            'staf tata usaha',
            'kepala tata usaha'
        ];

        if (tanpaMapel.includes(pilihan)) {
            mapel.value = '';
            mapel.required = false;
            mapel.disabled = true;
            container.style.display = 'none';
        } else {
            container.style.display = 'block';
            mapel.disabled = false;
            mapel.required = pilihan !== '';
        }
    }

    jabatan.addEventListener('change', aturMapel);
    aturMapel();
});
</script>
@endsection
