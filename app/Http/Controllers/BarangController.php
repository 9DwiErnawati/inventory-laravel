<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;


class BarangController extends Controller
{
    // Tampilkan semua barang
    public function index(Request $request)
    {
        $query = Barang::with('kategori');

        // FILTER / SEARCH
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('kode', 'like', "%{$search}%");
            });
        }
    
        // PAGINATION
        $barang = $query->latest()->paginate(10)->withQueryString();
    
        return view('barang.index', compact('barang'));
    }

    // Tampilkan form tambah barang
    public function create()
    {
        $kategori = Kategori::all();
        return view('barang.create', compact('kategori'));
    }

    // Simpan barang baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kode' => 'required|unique:barang,kode',
            'stok' => 'required|numeric',
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        Barang::create($request->all());

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan');
    }

    // Tampilkan form edit barang
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $kategori = Kategori::all();
        return view('barang.edit', compact('barang', 'kategori'));
    }

    // Update barang
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'kode' => 'required|unique:barang,kode,' . $id,
            'stok' => 'required|numeric',
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update($request->all());

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diupdate');
    }

    // Hapus barang
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus');
    }
}

