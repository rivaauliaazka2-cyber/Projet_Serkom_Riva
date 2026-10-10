<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasi = Prestasi::latest()->get();
        return view('admin.prestasi.index', compact('prestasi'));
    }

    public function create()
    {
        return view('admin.prestasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_prestasi' => 'required|max:40',
            'tahun_ajaran' => 'nullable|max:9',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        $foto = null;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $foto = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/prestasi'), $foto);
        }

        Prestasi::create([
            'nama_prestasi' => $request->nama_prestasi,
            'slug' => Str::slug($request->nama_prestasi),
            'deskripsi' => $request->deskripsi,
            'foto' => $foto,
            'tahun_ajaran' => $request->tahun_ajaran
        ]);

        return redirect()->route('prestasi.index')
            ->with('success', 'Data prestasi berhasil ditambahkan');
    }

    public function show(Prestasi $prestasi)
    {
        return view('admin.prestasi.show', compact('prestasi'));
    }

    public function edit(Prestasi $prestasi)
    {
        return view('admin.prestasi.edit', compact('prestasi'));
    }

    public function update(Request $request, Prestasi $prestasi)
    {
        $request->validate([
            'nama_prestasi' => 'required|max:40',
            'tahun_ajaran' => 'nullable|max:9',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        $foto = $prestasi->foto;

        if ($request->hasFile('foto')) {
            if ($prestasi->foto && file_exists(public_path('uploads/prestasi/' . $prestasi->foto))) {
                unlink(public_path('uploads/prestasi/' . $prestasi->foto));
            }

            $file = $request->file('foto');
            $foto = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/prestasi'), $foto);
        }

        $prestasi->update([
            'nama_prestasi' => $request->nama_prestasi,
            'slug' => Str::slug($request->nama_prestasi),
            'deskripsi' => $request->deskripsi,
            'foto' => $foto,
            'tahun_ajaran' => $request->tahun_ajaran
        ]);

        return redirect()->route('prestasi.index')
            ->with('success', 'Data prestasi berhasil diubah');
    }

    public function destroy(Prestasi $prestasi)
    {
        $prestasi->delete();

        return redirect()->route('prestasi.index');
    }
}
