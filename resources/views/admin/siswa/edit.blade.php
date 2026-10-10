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
                           value="{{ $siswa->nisn }}"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Siswa</label>
                    <input type="text"
                           name="nama_siswa"
                           value="{{ $siswa->nama_siswa }}"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" required>

                        <option value="Laki-Laki"
                            {{ $siswa->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>
                            Laki-Laki
                        </option>

                        <option value="Perempuan"
                            {{ $siswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                            Perempuan
                        </option>

                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tahun Masuk</label>
                    <input type="number"
                           name="tahun_masuk"
                           value="{{ $siswa->tahun_masuk }}"
                           class="form-control"
                           required>
                </div>

                <button type="submit" class="btn btn-primary">
                    Update
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
