<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';

    protected $fillable = [
        'kode_pinjam',
        'peminjam_id',
        'tanggal_pinjam'
    ];

    public function peminjam(): BelongsTo
    {
        return $this->belongsTo(
            Peminjam::class,
            'peminjam_id'
        );
    }

    public function detailPeminjaman(): HasMany
    {
        return $this->hasMany(
            DetailPeminjaman::class,
            'peminjaman_id'
        );
    }
}
