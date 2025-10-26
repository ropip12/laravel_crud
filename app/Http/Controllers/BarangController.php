<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
   public function index() {

        $barang = Barang::query();

        if (request('search')) {
            $barang->where('nama_barang','like','%' . request('search') . '%');
        }

        
        $barang = $barang->orderBy('id')->paginate(1);
        return view('barang.index', compact('barang'));
    }

   public function create() {
        return view('barang.tambah');
   }

   public function store(Request $request) {
    $request-> validate([
        'nama_barang' => 'required|string|max:100',
        'kategori' => 'required|string|max:100',
        'harga' => 'required|string|max:100',
        'stok' => 'required|string|max:100',
    ]);

    Barang::create($request->all());
    return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit(Barang $barang)
    {
        return view ('barang.edit', compact ('barang'));

    }

    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:100',
            'kategori'    => 'required|string|max:50',
            'harga'       => 'required|integer',
            'stok'        => 'required|integer',
        ]);
        $barang->update($request->all());

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil diperbarui.');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
    }

}
