<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::latest()->get();

        return view('admin.berita.index', compact('berita'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'   => 'required|string|max:50',
            'isi'     => 'nullable|string',
            'tanggal' => 'nullable|date',
            'status'  => 'required|in:Publish,Draft',
            'gambar'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $validated['slug'] = Str::slug($request->judul);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')
                ->store('berita', 'public');
        }

        // Menyimpan ID pengguna yang sedang login
        $validated['id_user'] = Auth::id();

        Berita::create($validated);

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $berita = $this->cariBeritaYangBolehDikelola($id);

        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, string $id)
    {
        $berita = $this->cariBeritaYangBolehDikelola($id);

        $validated = $request->validate([
            'judul'   => 'required|string|max:50',
            'isi'     => 'nullable|string',
            'tanggal' => 'nullable|date',
            'status'  => 'required|in:Publish,Draft',
            'gambar'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $validated['slug'] = Str::slug($request->judul);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')
                ->store('berita', 'public');
        }

        // ID pembuat berita tidak diubah saat update
        $berita->update($validated);

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil diupdate.');
    }

    public function destroy(string $id)
    {
        $berita = $this->cariBeritaYangBolehDikelola($id);

        $berita->delete();

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }

    /**
     * Memastikan hanya Admin atau pemilik berita
     * yang bisa mengedit dan menghapus berita.
     */
    private function cariBeritaYangBolehDikelola(string $id)
    {
        $berita = Berita::findOrFail($id);

        if (
            Auth::user()->role !== 'Admin' &&
            (string) $berita->id_user !== (string) Auth::id()
        ) {
            abort(403, 'Kamu tidak boleh mengubah berita milik pengguna lain.');
        }

        return $berita;
    }
}
