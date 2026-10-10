<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Guru::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nama_guru', 'like', '%' . $search . '%')
                ->orWhere('nip', 'like', '%' . $search . '%')
                ->orWhere('mapel', 'like', '%' . $search . '%');
            });
        }

        if ($request->filled('jabatan')) {
            $query->where('jabatan', $request->jabatan);
        }

        $guru = $query
            ->latest()
            ->paginate(10);

        $jabatanList = Guru::whereNotNull('jabatan')
            ->where('jabatan', '!=', '')
            ->distinct()
            ->orderBy('jabatan')
            ->pluck('jabatan');

        return view('admin.guru.index', compact(
            'guru',
            'jabatanList'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->role != 'Admin') {
            abort(403);
        }

        return view('admin.guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->role != 'Admin') {
            abort(403);
        }

        $data = $request->validate([
            'nama_guru' => 'required',
            'nip' => 'nullable',
            'mapel' => 'nullable',
            'jabatan' => 'nullable',
            'foto' => 'nullable|image'
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('guru', 'public');
        }

        Guru::create($data);

        return redirect()
            ->route('guru.index')
            ->with('success', 'Data guru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (Auth::user()->role != 'Admin') {
            abort(403);
        }

        $guru = Guru::findOrFail($id);

        return view('admin.guru.edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (Auth::user()->role != 'Admin') {
            abort(404);
        }

        $guru = Guru::findOrFail($id);

        $data = $request->validate([
            'nama_guru' => 'required',
            'nip' => 'nullable',
            'mapel' => 'nullable',
            'jabatan' => 'nullable',
            'foto' => 'nullable|image'
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('guru', 'public');
        }

        $guru->update($data);

        return redirect()
            ->route('guru.index')
            ->with('success', 'Data guru berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Auth::user()->role != 'Admin') {
            abort(404);
        }

        $guru = Guru::findOrFail($id);

        $guru->delete();

        return redirect()
            ->route('guru.index')
            ->with('success', 'Data guru berhasil dihapus');
    }
}
