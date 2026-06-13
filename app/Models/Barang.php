<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Barang extends Model
{
    protected $table = 'barang';

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'stok'
    ];

    public function detailPeminjaman(): HasMany
    {
        return $this->hasMany(
            DetailPeminjaman::class,
            'barang_id'
        );
    }
}
