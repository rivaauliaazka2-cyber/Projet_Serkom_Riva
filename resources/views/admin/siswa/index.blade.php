@extends('layouts.admin')

@section('content')

<div class="card shadow border-0">
    <div class="card-body p-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-0">Data Siswa</h2>

            @if(auth()->user()->role == 'Admin')
                <a href="{{ route('siswa.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Tambah Siswa
                </a>
            @endif
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Pencarian dan Filter --}}
        <form action="{{ route('siswa.index') }}" method="GET" class="mb-4">
            <div class="row g-2">

                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text"
                               name="search"
                               class="form-control"
                               placeholder="Cari NISN atau nama siswa..."
                               value="{{ request('search') }}">
                    </div>
                </div>

                <div class="col-md-2">
                    <select name="jenis_kelamin" class="form-select">
                        <option value="">Semua Jenis Kelamin</option>
                        <option value="Laki-Laki" {{ request('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>
                            Laki-Laki
                        </option>
                        <option value="Perempuan" {{ request('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                            Perempuan
                        </option>
                    </select>
                </div>

                <div class="col-md-2">
                    <select name="tahun_masuk" class="form-select">
                        <option value="">Semua Tahun</option>
                        @foreach($tahunList as $tahun)
                            <option value="{{ $tahun }}" {{ request('tahun_masuk') == $tahun ? 'selected' : '' }}>
                                {{ $tahun }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Filter Kelas --}}
                <div class="col-md-2">
                    <select name="id_kelas" class="form-select">
                        <option value="">Semua Kelas</option>
                        @foreach($kelasList as $kelasItem)
                            <option value="{{ $kelasItem->id_kelas }}"
                                {{ request('id_kelas') == $kelasItem->id_kelas ? 'selected' : '' }}>
                                {{ $kelasItem->nama_kelas }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2 d-flex gap-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-search"></i> Cari
                    </button>

                    <a href="{{ route('siswa.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-counterclockwise"></i>
                    </a>
                </div>

            </div>
        </form>

        {{-- Tabel Data Siswa --}}
        <div class="table-responsive">
            <table class="table table-bordered align-middle">

                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th>NISN</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Jenis Kelamin</th>
                        <th>Tahun Masuk</th>
                        <th width="120" class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($siswa as $item)
                        <tr>
                            <td>{{ $siswa->firstItem() + $loop->index }}</td>
                            <td>{{ $item->nisn }}</td>
                            <td>{{ $item->nama_siswa }}</td>

                            {{-- Nama Kelas --}}
                            <td>{{ $item->kelas->nama_kelas ?? '-' }}</td>

                            <td>
                                @if($item->jenis_kelamin == 'Laki-Laki')
                                    <span class="badge bg-primary">Laki-Laki</span>
                                @else
                                    <span class="badge bg-danger">Perempuan</span>
                                @endif
                            </td>

                            <td>{{ $item->tahun_masuk }}</td>

                            <td class="text-center">
                                @if(auth()->user()->role == 'Admin')
                                    <a href="{{ route('siswa.edit', $item->id_siswa) }}"
                                       class="btn btn-warning btn-sm"
                                       title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <form action="{{ route('siswa.destroy', $item->id_siswa) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus data siswa ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                Data siswa tidak ditemukan
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

        {{-- Pagination --}}
        @if($siswa->hasPages())
            <div class="d-flex justify-content-end mt-3">
                {{ $siswa->withQueryString()->links() }}
            </div>
        @endif

    </div>
</div>

@endsection
