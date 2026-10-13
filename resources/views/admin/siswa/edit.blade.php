@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <h4>Edit Siswa</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('siswa.update', $siswa->id_siswa) }}"
                  method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">NISN</label>
                    <input type="text"
                           name="nisn"
                           value="{{ old('nisn', $siswa->nisn) }}"
                           class="form-control"
                           required>

                    @error('nisn')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Siswa</label>
                    <input type="text"
                           name="nama_siswa"
                           value="{{ old('nama_siswa', $siswa->nama_siswa) }}"
                           class="form-control"
                           required>

                    @error('nama_siswa')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Dropdown Kelas --}}
                <div class="mb-3">
                    <label for="id_kelas" class="form-label">Kelas</label>

                    <select name="id_kelas"
                            id="id_kelas"
                            class="form-select"
                            required>

                        <option value="">-- Pilih Kelas --</option>

                        @foreach ($kelas as $item)
                            <option value="{{ $item->id_kelas }}"
                                {{ old('id_kelas', $siswa->id_kelas) == $item->id_kelas ? 'selected' : '' }}>
                                {{ $item->nama_kelas }}
                            </option>
                        @endforeach

                    </select>

                    @error('id_kelas')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>

                    <select name="jenis_kelamin"
                            class="form-select"
                            required>

                        <option value="Laki-Laki"
                            {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>
                            Laki-Laki
                        </option>

                        <option value="Perempuan"
                            {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                            Perempuan
                        </option>

                    </select>

                    @error('jenis_kelamin')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Tahun Masuk</label>

                    <input type="number"
                           name="tahun_masuk"
                           value="{{ old('tahun_masuk', $siswa->tahun_masuk) }}"
                           class="form-control"
                           required>

                    @error('tahun_masuk')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Update
                </button>

                <a href="{{ route('siswa.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>

</div>
@endsection
