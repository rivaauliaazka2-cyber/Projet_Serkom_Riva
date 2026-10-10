@extends('layouts.admin')
@section('content')
<div class="card shadow border-0">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-0">
                Data Galeri
            </h2>
            @if(auth()->user()->role == 'Admin')
                <a href="{{ route('galeri.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Tambah Galeri
                </a>
            @endif
        </div>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th width="120">File</th>
                        <th>Judul</th>
                        <th width="150">Kategori</th>
                        <th width="150">Tanggal</th>
                        <th width="150" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($galeri as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>
                            @if($item->file)
                                @if($item->kategori == 'Foto')
                                    <img src="{{ asset('uploads/galeri/'.$item->file) }}"
                                        width="80"
                                        class="img-thumbnail"
                                        alt="{{ $item->judul }}">

                                @elseif($item->kategori == 'Video')
                                    <video width="120" controls preload="metadata">
                                        <source src="{{ asset('uploads/galeri/'.$item->file) }}">
                                        Browser kamu tidak mendukung video.
                                    </video>
                                @endif
                            @endif
                        </td>

                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->kategori }}</td>
                        <td>{{ $item->tanggal }}</td>

                        <td class="text-center">
                            @if(auth()->user()->role == 'Admin')
                                <a href="{{ route('galeri.edit', $item->id_galeri) }}"
                                class="btn btn-warning btn-sm"
                                title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="{{ route('galeri.destroy', $item->id_galeri) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus galeri ini?')">
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
                        <td colspan="6" class="text-center text-muted">
                            Data galeri kosong
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
