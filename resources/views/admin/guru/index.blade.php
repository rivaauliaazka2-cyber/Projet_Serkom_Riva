@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">Data Guru</h4>
            <p class="text-muted mb-0">Kelola data guru sekolah</p>
        </div>

        @if(Auth::user()->role === 'Admin')
            <a href="{{ route('guru.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Tambah Guru
            </a>
        @endif
    </div>

    {{-- FILTER --}}
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <form action="{{ route('guru.index') }}" method="GET">
                <div class="row g-2">

                    <div class="col-md-5">
                        <input type="text"
                               name="search"
                               class="form-control"
                               placeholder="Cari nama, NIP, atau mata pelajaran..."
                               value="{{ request('search') }}">
                    </div>

                    <div class="col-md-4">
                        <select name="jabatan" class="form-select">
                            <option value="">-- Semua Jabatan --</option>

                            @foreach($jabatanList as $jabatan)
                                <option value="{{ $jabatan }}"
                                    {{ request('jabatan') == $jabatan ? 'selected' : '' }}>
                                    {{ $jabatan }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3 d-flex gap-2">
                        <button type="submit" class="btn btn-primary flex-fill">
                            <i class="bi bi-search"></i> Cari
                        </button>

                        <a href="{{ route('guru.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-clockwise"></i>
                        </a>
                    </div>

                </div>
            </form>
        </div>
    </div>

    {{-- TABLE --}}
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">
                <i class="bi bi-people"></i> Daftar Guru
            </h5>
        </div>

        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-hover align-middle">

                    <thead class="table-light">
                        <tr>
                            <th width="60">No</th>
                            <th width="90">Foto</th>
                            <th>Nama Guru</th>
                            <th>NIP</th>
                            <th>Mata Pelajaran</th>
                            <th>Jabatan</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($guru as $item)

                        <tr>
                            <td>
                                {{ $guru->firstItem() + $loop->index }}
                            </td>

                            <td>
                                @if($item->foto)
                                    <img src="{{ asset('storage/'.$item->foto) }}"
                                         width="55"
                                         height="55"
                                         class="rounded-circle"
                                         style="object-fit: cover;">
                                @else
                                    <div class="rounded-circle bg-light d-flex align-items-center justify-content-center"
                                         style="width:55px;height:55px;">
                                        <i class="bi bi-person fs-4 text-muted"></i>
                                    </div>
                                @endif
                            </td>

                            <td>
                                <strong>{{ $item->nama_guru }}</strong>
                            </td>

                            <td>
                                {{ $item->nip ?: '-' }}
                            </td>

                            <td>
                                {{ $item->mapel ?: '-' }}
                            </td>

                            <td>
                                @if($item->jabatan)
                                    <span class="badge bg-primary">
                                        {{ $item->jabatan }}
                                    </span>
                                @else
                                    -
                                @endif
                            </td>

                            <td>
                                <div class="d-flex gap-1">

                                    {{-- DETAIL --}}
                                    <button type="button"
                                            class="btn btn-info btn-sm text-white"
                                            data-bs-toggle="modal"
                                            data-bs-target="#detailModal{{ $item->id_guru }}"
                                            title="Detail">
                                        <i class="bi bi-eye"></i>
                                    </button>

                                    @if(auth()->user()->role == 'Admin')

                                        {{-- EDIT --}}
                                        <a href="{{ route('guru.edit', $item->id_guru) }}"
                                        class="btn btn-warning btn-sm"
                                        title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        {{-- DELETE --}}
                                        <form action="{{ route('guru.destroy', $item->id_guru) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus data guru ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>

                                        </form>

                                    @endif

                                </div>
                            </td>
                        </tr>

                        {{-- MODAL DETAIL --}}
                        <div class="modal fade"
                             id="detailModal{{ $item->id_guru }}"
                             tabindex="-1"
                             aria-hidden="true">

                            <div class="modal-dialog modal-dialog-centered">

                                <div class="modal-content">

                                    <div class="modal-header bg-primary text-white">
                                        <h5 class="modal-title">
                                            <i class="bi bi-person-vcard"></i>
                                            Detail Guru
                                        </h5>

                                        <button type="button"
                                                class="btn-close btn-close-white"
                                                data-bs-dismiss="modal">
                                        </button>
                                    </div>

                                    <div class="modal-body text-center">

                                        @if($item->foto)

                                            <img src="{{ asset('storage/'.$item->foto) }}"
                                                 width="120"
                                                 height="120"
                                                 class="rounded-circle mb-3"
                                                 style="object-fit: cover;">

                                        @else

                                            <div class="rounded-circle bg-light d-flex align-items-center justify-content-center mx-auto mb-3"
                                                 style="width:120px;height:120px;">
                                                <i class="bi bi-person fs-1 text-muted"></i>
                                            </div>

                                        @endif

                                        <h5 class="fw-bold">
                                            {{ $item->nama_guru }}
                                        </h5>

                                        <hr>

                                        <div class="text-start">

                                            <p class="mb-2">
                                                <strong>NIP:</strong>
                                                {{ $item->nip ?: '-' }}
                                            </p>

                                            <p class="mb-2">
                                                <strong>Mata Pelajaran:</strong>
                                                {{ $item->mapel ?: '-' }}
                                            </p>

                                            <p class="mb-2">
                                                <strong>Jabatan:</strong>
                                                {{ $item->jabatan ?: '-' }}
                                            </p>

                                        </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="button"
                                                class="btn btn-secondary"
                                                data-bs-dismiss="modal">
                                            Tutup
                                        </button>
                                    </div>

                                </div>

                            </div>

                        </div>

                    @empty

                        <tr>
                            <td colspan="7" class="text-center py-5">

                                <i class="bi bi-person-x fs-1 text-muted"></i>

                                <h5 class="mt-3">
                                    Data guru belum ada
                                </h5>

                                <p class="text-muted">
                                    Belum ada data guru yang ditambahkan.
                                </p>
                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>
            </div>

            {{-- PAGINATION --}}
            <div class="mt-3">
                {{ $guru->withQueryString()->links() }}
            </div>

        </div>
    </div>

</div>
@endsection
