@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="card shadow border-0">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Data Ekstrakurikuler</h2>

                @if(auth()->user()->role == 'Admin')
                    <a href="{{ route('ekskul.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Tambah Ekskul
                    </a>
                @endif
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Search & Filter -->
            <form action="{{ route('ekskul.index') }}" method="GET" class="mb-4">
                <div class="row g-2">

                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-search"></i>
                            </span>

                            <input
                                type="text"
                                name="search"
                                class="form-control"
                                placeholder="Cari nama ekskul atau pembina..."
                                value="{{ request('search') }}">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <select name="pembina" class="form-select">
                            <option value="">Semua Pembina</option>

                            @foreach($pembinaList as $pembina)
                                <option value="{{ $pembina }}"
                                    {{ request('pembina') == $pembina ? 'selected' : '' }}>
                                    {{ $pembina }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-search"></i>
                            Cari
                        </button>
                    </div>

                    <div class="col-md-2">
                        <a href="{{ route('ekskul.index') }}"
                           class="btn btn-secondary w-100">
                            <i class="bi bi-arrow-clockwise"></i>
                            Reset
                        </a>
                    </div>

                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama Ekskul</th>
                            <th>Pembina</th>
                            <th>Jadwal Latihan</th>
                            <th>Deskripsi</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($ekskul as $item)

                        <tr>

                            <td>{{ $ekskul->firstItem() + $loop->index }}</td>

                            <td>
                                @if($item->gambar)
                                    <img
                                        src="{{ asset('storage/'.$item->gambar) }}"
                                        width="70"
                                        height="70"
                                        class="img-thumbnail"
                                        style="object-fit: cover;">
                                @else
                                    -
                                @endif
                            </td>

                            <td>
                                {{ $item->nama_ekskul }}
                            </td>

                            <td>
                                {{ $item->pembina }}
                            </td>

                            <td>
                                {{ $item->jadwal_latihan }}
                            </td>

                            <td>
                                {{ $item->deskripsi }}
                            </td>

                            <td>

                                @if(auth()->user()->role == 'Admin')

                                    <a href="{{ route('ekskul.edit', $item->id_ekskul) }}"
                                    class="btn btn-warning btn-sm"
                                    title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <form action="{{ route('ekskul.destroy', $item->id_ekskul) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data ekskul ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="7" class="text-center">
                                Data ekstrakurikuler tidak ditemukan
                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-3">
                {{ $ekskul->withQueryString()->links() }}
            </div>

        </div>
    </div>

</div>

@endsection
