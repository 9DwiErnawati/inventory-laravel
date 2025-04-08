<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        $query = Kategori::query();

        if ($request->has('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }
    
        $kategori = $query->latest()->paginate(10)->withQueryString();
    
        return view('kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        Kategori::create($request->all());

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function destroy($id)
    {
        Kategori::findOrFail($id)->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus');
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->nama = $request->nama;
        $kategori->save();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }


}
