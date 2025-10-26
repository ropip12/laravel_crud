<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;

class KaryawanController extends Controller
{
    public function index(Request $request)
    {

        $search = $request->input('search');
    
        $karyawans = Karyawan::when($search, function ($query, $search) {
            return $query->where('nama', 'like', "%{$search}%")
                         ->orWhere('jenis_kelamin', 'like', "%{$search}%");
        })->paginate(10);

        return view('karyawan.index', compact('karyawans', 'search'));


    }

    public function create()
    {
        return view('karyawan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'jenis_kelamin' => 'required|string',
            'foto_karyawan' => 'image|file|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto_karyawan')) {
            $file = $request->file('foto_karyawan');
            $path = $file->store('foto_karyawan', 'public');
            $data['foto_karyawan'] = $path;
        }

        Karyawan::create($data);

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil ditambahkan');
    }

    public function edit(Karyawan $karyawan)
    {
        return view('karyawan.edit', compact('karyawan'));
    }

    public function update(Request $request, Karyawan $karyawan)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'jenis_kelamin' => 'required|string',
            'foto_karyawan' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto_karyawan')) {
            $file = $request->file('foto_karyawan');
            $path = $file->store('foto_karyawan', 'public');
            $data['foto_karyawan'] = $path;
        }

        $karyawan->update($data);

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil diperbarui');
    }


    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();
        return redirect()->route('karyawan.index')->with('success', 'Data karyawan dihapus');
    }

    
}  