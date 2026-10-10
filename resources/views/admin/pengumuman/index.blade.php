@extends('layouts.admin')
@section('content')
<div class="card shadow border-0">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Data Pengumuman</h4>

        @if(auth()->user()->role == 'Admin')
            <a href="{{ route('pengumuman.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Pengumuman
            </a>
        @endif
    </div>
    <div class="card-body">
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
                        <th>Judul</th>
                        <th width="150">Tanggal</th>
                        <th width="120">Status</th>
                        <th width="150" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pengumuman as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>
                            @if($item->status == 'Publish')
                                <span class="badge bg-success">
                                    Publish
                                </span>
                            @else
                                <span class="badge bg-secondary">
                                    Draft
                                </span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if(auth()->user()->role == 'Admin')

                                <a href="{{ route('pengumuman.edit', $item->id_pengumuman) }}"
                                class="btn btn-warning btn-sm"
                                title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="{{ route('pengumuman.destroy', $item->id_pengumuman) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus pengumuman ini?')">

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
                        <td colspan="5" class="text-center">
                            Belum ada data pengumuman
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
