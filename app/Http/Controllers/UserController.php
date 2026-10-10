<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:8',
            'role' => 'required|in:Admin,Operator'
        ]);

        User::create([
            'id_user' => Str::uuid(),
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => $request->role
        ]);

        return redirect()->route('user.index')
            ->with('success', 'User berhasil ditambahkan');
    }

    // Menampilkan halaman edit user
    public function edit($id)
    {
        $user = User::where('id_user', $id)->firstOrFail();

        return view('admin.user.edit', compact('user'));
    }

    // Menyimpan perubahan user
    public function update(Request $request, $id)
    {
        $user = User::where('id_user', $id)->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users', 'username')->ignore($user->id_user, 'id_user')
            ],
            'role' => 'required|in:Admin,Operator',
            'password' => 'nullable|string|min:8'
        ]);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->role = $request->role;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('user.index')
            ->with('success', 'Data user berhasil diperbarui');
    }

    // Menghapus user
    public function destroy($id)
    {
        $user = User::where('id_user', $id)->firstOrFail();

        $user->delete();

        return redirect()->route('user.index')
            ->with('success', 'User berhasil dihapus');
    }
}
