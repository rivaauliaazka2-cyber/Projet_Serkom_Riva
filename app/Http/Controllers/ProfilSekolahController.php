<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilSekolah;

class ProfilSekolahController extends Controller
{
    public function index()
    {
        $profil = ProfilSekolah::first();

        return view('admin.profil.index', compact('profil'));
    }

    public function create()
    {
        return view('admin.profil.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_sekolah'   => 'required',
            'kepala_sekolah' => 'required',
            'npsn'           => 'nullable',
            'alamat'         => 'nullable',
            'visi_misi'      => 'nullable',
            'tahun_berdiri'  => 'nullable',
            'deskripsi'      => 'nullable',
            'foto'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'logo'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $namaFoto = time().'_foto.'.$request->foto->extension();
            $request->foto->move(public_path('uploads/profil'), $namaFoto);
            $data['foto'] = $namaFoto;
        }

        if ($request->hasFile('logo')) {
            $namaLogo = time().'_logo.'.$request->logo->extension();
            $request->logo->move(public_path('uploads/profil'), $namaLogo);
            $data['logo'] = $namaLogo;
        }

        ProfilSekolah::create($data);

        return redirect()
            ->route('profil.index')
            ->with('success', 'Profil sekolah berhasil ditambahkan');
    }

    public function edit($id)
    {
        $profil = ProfilSekolah::findOrFail($id);

        return view('admin.profil.edit', compact('profil'));
    }

    public function update(Request $request, $id)
    {
        $profil = ProfilSekolah::findOrFail($id);

        $data = $request->validate([
            'nama_sekolah'   => 'required',
            'kepala_sekolah' => 'required',
            'npsn'           => 'nullable',
            'alamat'         => 'nullable',
            'visi_misi'      => 'nullable',
            'tahun_berdiri'  => 'nullable',
            'deskripsi'      => 'nullable',
            'foto'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'logo'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $namaFoto = time().'_foto.'.$request->foto->extension();
            $request->foto->move(public_path('uploads/profil'), $namaFoto);
            $data['foto'] = $namaFoto;
        }

        if ($request->hasFile('logo')) {
            $namaLogo = time().'_logo.'.$request->logo->extension();
            $request->logo->move(public_path('uploads/profil'), $namaLogo);
            $data['logo'] = $namaLogo;
        }

        $profil->update($data);

        return redirect()
            ->route('profil.index')
            ->with('success', 'Profil sekolah berhasil diperbarui');
    }
}
