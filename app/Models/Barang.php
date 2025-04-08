<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    // Field yang boleh diisi mass-assignment
    protected $fillable = ['nama', 'kode', 'stok', 'kategori_id'];
    protected $table = 'barang';

    // Relasi ke kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
