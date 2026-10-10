<?php
namespace App\Http\Controllers;
use App\Models\Berita;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::all();
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
            $validated['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $validated['id_user'] = User::value('id_user');

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
        $berita = Berita::findOrFail($id);

        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, string $id)
    {
        $berita = Berita::findOrFail($id);

        $validated = $request->validate([
            'judul'   => 'required|string|max:50',
            'isi'     => 'nullable|string',
            'tanggal' => 'nullable|date',
            'status'  => 'required|in:Publish,Draft',
            'gambar'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $validated['slug'] = Str::slug($request->judul);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $berita->update($validated);

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil diupdate.');
    }

    public function destroy(string $id)
    {
        $berita = Berita::findOrFail($id);

        $berita->delete();

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}
