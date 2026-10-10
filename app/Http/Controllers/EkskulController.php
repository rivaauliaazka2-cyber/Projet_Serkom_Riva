<?php

namespace App\Http\Controllers;

use App\Models\ekstrakulikuler;
use App\Models\ekstrakurikuler;
use Illuminate\Http\Request;

class EkskulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
    {
        $query = ekstrakurikuler::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nama_ekskul', 'like', '%' . $search . '%')
                ->orWhere('pembina', 'like', '%' . $search . '%');
            });
        }

        if ($request->filled('pembina')) {
            $query->where('pembina', $request->pembina);
        }

        $ekskul = $query
            ->latest()
            ->paginate(10);

        $pembinaList = ekstrakurikuler::whereNotNull('pembina')
            ->where('pembina', '!=', '')
            ->distinct()
            ->orderBy('pembina')
            ->pluck('pembina');

        return view('admin.ekskul.index', compact(
            'ekskul',
            'pembinaList'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ekskul.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $data = $request->validate([
            'nama_ekskul' => 'required',
            'pembina' => 'nullable',
            'jadwal_latihan' => 'nullable',
            'deskripsi' => 'nullable',
            'gambar' => 'nullable|image'
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')
                ->store('ekskul', 'public');
        }
        ekstrakurikuler::create($data);
        return redirect()
            ->route('ekskul.index')
            ->with('success', 'Data berhasil ditambahkan');
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
        $ekskul = ekstrakurikuler::findOrFail($id);

        return view('admin.ekskul.edit', compact('ekskul'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ekskul = ekstrakurikuler::findOrFail($id);

        $data = $request->validate([
            'nama_ekskul' => 'required',
            'pembina' => 'nullable',
            'jadwal_latihan' => 'nullable',
            'deskripsi' => 'nullable',
            'gambar' => 'nullable|image'
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')
                ->store('ekskul', 'public');
        }

        $ekskul->update($data);

        return redirect()
            ->route('ekskul.index')
            ->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ekskul = ekstrakurikuler::findOrFail($id);

        $ekskul->delete();

        return redirect()
            ->route('ekskul.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
