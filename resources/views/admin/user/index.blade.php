@extends('layouts.admin')

@section('content')
<div class="container-fluid py-3">
    <div class="card shadow border-0">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Data User</h4>

            <a href="{{ route('user.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah User
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead>
                        <tr>
                            <th>ID User</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th width="120">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($users as $user)
                        <tr>
                            <td>{{ $user->id_user }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->role }}</td>

                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('user.edit', $user->id_user) }}"
                                       class="btn btn-warning btn-sm"
                                       title="Edit User">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <form action="{{ route('user.destroy', $user->id_user) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                title="Hapus User">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                Belum ada data user.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection
