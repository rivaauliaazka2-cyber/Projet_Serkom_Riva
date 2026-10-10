@extends('layouts.admin')

@section('content')
<div class="container-fluid py-3">
    <div class="row justify-content-center">
        <div class="col-lg-7">

            <div class="card shadow border-0">
                <div class="card-header">
                    <h4 class="mb-0">Edit User</h4>
                </div>

                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('user.update', $user->id_user) }}"
                          method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">ID User</label>
                            <input type="text"
                                   class="form-control"
                                   value="{{ $user->id_user }}"
                                   readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   value="{{ old('name', $user->name) }}"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text"
                                   name="username"
                                   class="form-control"
                                   value="{{ old('username', $user->username) }}"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <select name="role" class="form-select" required>
                                <option value="Admin"
                                    {{ old('role', $user->role) == 'Admin' ? 'selected' : '' }}>
                                    Admin
                                </option>

                                <option value="Operator"
                                    {{ old('role', $user->role) == 'Operator' ? 'selected' : '' }}>
                                    Operator
                                </option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password Baru</label>
                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   placeholder="Kosongkan jika tidak diubah">

                            <small class="text-muted">
                                Isi minimal 8 karakter jika ingin mengganti password.
                            </small>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('user.index') }}"
                               class="btn btn-secondary">
                                Kembali
                            </a>

                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Update
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
