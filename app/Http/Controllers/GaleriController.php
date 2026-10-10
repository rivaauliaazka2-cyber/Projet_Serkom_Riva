<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galeri = Galeri::latest()->get();

        return view('admin.galeri.index', compact('galeri'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.galeri.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $aturanFile = $request->kategori === 'Foto'
            ? 'required|file|mimes:jpg,jpeg,png,webp|max:10240'
            : 'required|file|mimes:mp4,webm,ogg|max:51200';

        $request->validate([
            'judul' => 'required|max:50',
            'kategori' => 'required|in:Foto,Video',
            'keterangan' => 'nullable|string',
            'tanggal' => 'required|date',
            'file' => $aturanFile,
        ]);

        $file = $request->file('file');

        $namaFile = time().'_'.$file->getClientOriginalName();

        $file->move(public_path('uploads/galeri'), $namaFile);

        Galeri::create([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'file' => $namaFile,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('galeri.index')
            ->with('success', 'Data galeri berhasil ditambahkan');
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
       $galeri = Galeri::findOrFail($id);
       return view('admin.galeri.edit', compact('galeri'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $galeri = Galeri::findOrFail($id);

        $aturanFile = $request->kategori === 'Foto'
            ? 'nullable|file|mimes:jpg,jpeg,png,webp|max:10240'
            : 'nullable|file|mimes:mp4,webm,ogg|max:51200';

        $request->validate([
            'judul' => 'required|max:50',
            'kategori' => 'required|in:Foto,Video',
            'keterangan' => 'nullable|string',
            'tanggal' => 'required|date',
            'file' => $aturanFile,
        ]);

        // Jika kategori berubah, file baru wajib diunggah
        if (
            $request->kategori !== $galeri->kategori
            && !$request->hasFile('file')
        ) {
            return back()
                ->withErrors([
                    'file' => 'Unggah file baru sesuai kategori yang dipilih.'
                ])
                ->withInput();
        }

        $namaFile = $galeri->file;

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $namaFile = time().'_'.$file->getClientOriginalName();

            $file->move(public_path('uploads/galeri'), $namaFile);

            if (
                $galeri->file &&
                file_exists(public_path('uploads/galeri/'.$galeri->file))
            ) {
                unlink(public_path('uploads/galeri/'.$galeri->file));
            }
        }

        $galeri->update([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'file' => $namaFile,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('galeri.index')
            ->with('success', 'Data galeri berhasil diubah');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $galeri = Galeri::findOrFail($id);

        if ($galeri->file &&
            file_exists(public_path('uploads/galeri/'.$galeri->file))) {

            unlink(public_path('uploads/galeri/'.$galeri->file));
        }

        $galeri->delete();

        return redirect()->route('galeri.index')
            ->with('success', 'Data galeri berhasil dihapus');
    }
}
