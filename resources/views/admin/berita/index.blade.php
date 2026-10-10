@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Data Berita</h4>

        @if(auth()->user()->role == 'Admin')
            <a href="{{ route('berita.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Berita
            </a>
        @endif
    </div>

    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered table-hover">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Gambar</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($berita as $item)
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

                        <td>
                            @if($item->gambar)
                                <img src="{{ asset('storage/'.$item->gambar) }}"
                                     width="80">
                            @else
                                -
                            @endif
                        </td>

                        <td>
                            @if(auth()->user()->role == 'Admin')

                                <a href="{{ route('berita.edit', $item->id_berita) }}"
                                class="btn btn-warning btn-sm"
                                title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="{{ route('berita.destroy', $item->id_berita) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus berita ini?')">

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
                        <td colspan="6" class="text-center">
                            Data berita belum ada
                        </td>
                    </tr>
                    @endforelse

                </tbody>

            </table>
        </div>

    </div>
</div>

@endsection
