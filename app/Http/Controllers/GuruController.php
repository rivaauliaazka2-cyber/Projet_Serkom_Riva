<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Guru;
use App\Models\MataPelajaran;
use App\Models\Jabatan;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        $query = Guru::query();

        // Pencarian guru
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nama_guru', 'like', '%' . $search . '%')
                    ->orWhere('nip', 'like', '%' . $search . '%')
                    ->orWhere('mapel', 'like', '%' . $search . '%');
            });
        }

        // Filter berdasarkan jabatan
        if ($request->filled('jabatan')) {
            $query->where('jabatan', $request->jabatan);
        }

        $guru = $query->latest()->paginate(10);

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

    public function create()
    {
        if (Auth::user()->role != 'Admin') {
            abort(403);
        }
        $mapel = MataPelajaran::orderBy('nama_mapel')->get();
        $jabatan = Jabatan::orderBy('nama_jabatan')->get();
        return view('admin.guru.create', compact('mapel', 'jabatan'));
    }


public function store(Request $request)
{
    if (Auth::user()->role != 'Admin') {
        abort(403);
    }

    $data = $request->validate([
        'nama_guru' => 'required|string|max:40',
        'nip' => 'nullable|string|max:18',
        'jabatan' => 'required|exists:jabatan,nama_jabatan',
        'mapel' => [
            'nullable',
            'required_unless:jabatan,Kepala Sekolah,Kepala Tata Usaha,Staff Tata Usaha',
            'exists:mata_pelajaran,nama_mapel',
        ],
        'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ], [
        'nama_guru.required' => 'Nama guru wajib diisi.',
        'nama_guru.max' => 'Nama guru maksimal 40 karakter.',
        'nip.max' => 'NIP maksimal 18 karakter.',
        'jabatan.required' => 'Jabatan wajib dipilih.',
        'jabatan.exists' => 'Jabatan tidak tersedia di database.',
        'mapel.required' => 'Mata pelajaran wajib dipilih.',
        'mapel.exists' => 'Mata pelajaran tidak tersedia di database.',
        'foto.image' => 'File harus berupa gambar.',
        'foto.mimes' => 'Foto harus berformat JPG, JPEG, PNG, atau WEBP.',
        'foto.max' => 'Ukuran foto maksimal 2 MB.',
    ]);

    if (in_array($data['jabatan'], [
        'Kepala Sekolah',
        'Kepala Tata Usaha',
        'Staff Tata Usaha',
    ])) {
        $data['mapel'] = null;
    }

    if ($request->hasFile('foto')) {
        $data['foto'] = $request->file('foto')
            ->store('guru', 'public');
    }

    Guru::create($data);

    return redirect()
        ->route('guru.index')
        ->with('success', 'Data guru berhasil ditambahkan.');
}



    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        if (Auth::user()->role != 'Admin') {
            abort(403);
        }

        $guru = Guru::findOrFail($id);
        $mapel = MataPelajaran::orderBy('nama_mapel')->get();
        $jabatan = Jabatan::orderBy('nama_jabatan')->get();

        return view('admin.guru.edit', compact(
            'guru',
            'mapel',
            'jabatan'
        ));
    }


public function update(Request $request, string $id)
{
    if (Auth::user()->role != 'Admin') {
        abort(403);
    }

    $guru = Guru::findOrFail($id);

    $data = $request->validate([
        'nama_guru' => 'required|string|max:40',
        'nip' => 'nullable|string|max:18',
        'jabatan' => 'required|exists:jabatan,nama_jabatan',
        'mapel' => [
            'nullable',
            'required_unless:jabatan,Kepala Sekolah,Kepala Tata Usaha,Staff Tata Usaha',
            'exists:mata_pelajaran,nama_mapel',
        ],
        'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ], [
        'nama_guru.required' => 'Nama guru wajib diisi.',
        'nama_guru.max' => 'Nama guru maksimal 40 karakter.',
        'nip.max' => 'NIP maksimal 18 karakter.',
        'jabatan.required' => 'Jabatan wajib dipilih.',
        'jabatan.exists' => 'Jabatan tidak tersedia di database.',
        'mapel.required' => 'Mata pelajaran wajib dipilih.',
        'mapel.exists' => 'Mata pelajaran tidak tersedia di database.',
        'foto.image' => 'File harus berupa gambar.',
        'foto.mimes' => 'Foto harus berformat JPG, JPEG, PNG, atau WEBP.',
        'foto.max' => 'Ukuran foto maksimal 2 MB.',
    ]);

    if (in_array($data['jabatan'], [
        'Kepala Sekolah',
        'Kepala Tata Usaha',
        'Staff Tata Usaha',
    ])) {
        $data['mapel'] = null;
    }

    if ($request->hasFile('foto')) {
        $data['foto'] = $request->file('foto')
            ->store('guru', 'public');
    }

    $guru->update($data);

    return redirect()
        ->route('guru.index')
        ->with('success', 'Data guru berhasil diperbarui.');
}


    public function destroy(string $id)
    {
        if (Auth::user()->role != 'Admin') {
            abort(403);
        }

        $guru = Guru::findOrFail($id);

        $guru->delete();

        return redirect()
            ->route('guru.index')
            ->with('success', 'Data guru berhasil dihapus.');
    }
}
