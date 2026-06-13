<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Peminjam;
use App\Models\Peminjaman;
use App\Models\DetailPeminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with([
            'peminjam',
            'detailPeminjaman.barang'
        ])
            ->latest()
            ->get();

        return view(
            'peminjaman.index',
            compact('peminjaman')
        );
    }

    public function create()
    {
        $barang = Barang::orderBy('nama_barang')
            ->get();

        $peminjam = Peminjam::orderBy('nama_peminjam')
            ->get();

        return view(
            'peminjaman.create',
            compact(
                'barang',
                'peminjam'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'peminjam_id' => 'required|exists:peminjam,id',
            'barang_id'   => 'required|exists:barang,id',
            'qty'         => 'required|integer|min:1',
        ]);

        DB::beginTransaction();

        try {

            $barang = Barang::findOrFail(
                $request->barang_id
            );

            if ($request->qty > $barang->stok) {

                DB::rollBack();

                return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors([
                        'qty' => 'Stok barang tidak mencukupi. Stok tersedia hanya ' . $barang->stok . ' unit.'
                    ]);
            }

            $peminjaman = Peminjaman::create([
                'kode_pinjam' => 'PJM-' . date('YmdHis'),
                'peminjam_id' => $request->peminjam_id,
                'tanggal_pinjam' => now()->format('Y-m-d'),
            ]);

            DetailPeminjaman::create([
                'peminjaman_id' => $peminjaman->id,
                'barang_id'     => $barang->id,
                'qty'           => $request->qty,
            ]);

            $barang->update([
                'stok' => $barang->stok - $request->qty
            ]);

            DB::commit();

            return redirect()
                ->route('peminjaman.index')
                ->with(
                    'success',
                    'Transaksi peminjaman berhasil disimpan.'
                );
        } catch (\Exception $e) {

            DB::rollBack();

            return back()
                ->withErrors([
                    'error' => $e->getMessage()
                ]);
        }
    }
}
