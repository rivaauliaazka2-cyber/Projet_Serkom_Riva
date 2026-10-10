@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card-header bg-danger text-white">
            <h5 class="mb-0">Tambah Pengguna</h5>
        </div>

        <div class="card-body">

            <form action="{{ route('user.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text"
                           name="name"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text"
                           name="username"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password"
                           name="password"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Role</label>

                    <select name="role" class="form-select" required>
                        <option value="">-- Pilih Role --</option>
                        <option value="Admin">Admin</option>
                        <option value="Operator">Operator</option>
                    </select>
                </div>

                <a href="{{ route('user.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

                <button type="submit"
                        class="btn btn-primary">
                    Simpan
                </button>

            </form>

        </div>
    </div>

</div>
@endsection
