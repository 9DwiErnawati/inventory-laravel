<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalKategori = Kategori::count();
        $totalBarang = Barang::count();
    
        return view('dashboard', compact('totalKategori', 'totalBarang'));
    }
}
