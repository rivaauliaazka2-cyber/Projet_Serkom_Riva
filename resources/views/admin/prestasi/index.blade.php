@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Data Prestasi</h3>
        @if(auth()->user()->role == 'Admin')
            <a href="{{ route('prestasi.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Prestasi
            </a>
        @endif
    </div>
    <div class="card shadow border-0">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama Prestasi</th>
                        <th>Tahun Ajaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($prestasi as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td width="120">
                            @if($item->foto)
                                <img src="{{ asset('uploads/prestasi/'.$item->foto) }}"
                                     width="100">
                            @endif
                        </td>
                        <td>{{ $item->nama_prestasi }}</td>
                        <td>{{ $item->tahun_ajaran }}</td>
                        <td width="180">
                            @if(auth()->user()->role == 'Admin')

                                <a href="{{ route('prestasi.edit', $item->id_prestasi) }}"
                                class="btn btn-warning btn-sm"
                                title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="{{ route('prestasi.destroy', $item->id_prestasi) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data prestasi ini?')">

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
                            Data belum tersedia
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
