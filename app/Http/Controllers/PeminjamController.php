<?php

namespace App\Http\Controllers;

use App\Models\Peminjam;
use Illuminate\Http\Request;

class PeminjamController extends Controller
{
    public function index()
    {
        $peminjam = Peminjam::orderBy('id', 'desc')->get();

        return view('peminjam.index', compact('peminjam'));
    }

    public function create()
    {
        return view('peminjam.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_peminjam' => 'required|max:100',
            'no_hp'         => 'required|max:20',
            'alamat'        => 'required',
        ]);

        Peminjam::create([
            'nama_peminjam' => $request->nama_peminjam,
            'no_hp'         => $request->no_hp,
            'alamat'        => $request->alamat,
        ]);

        return redirect()
            ->route('peminjam.index')
            ->with('success', 'Data peminjam berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $peminjam = Peminjam::findOrFail($id);

        return view('peminjam.edit', compact('peminjam'));
    }

    public function update(Request $request, string $id)
    {
        $peminjam = Peminjam::findOrFail($id);

        $request->validate([
            'nama_peminjam' => 'required|max:100',
            'no_hp'         => 'required|max:20',
            'alamat'        => 'required',
        ]);

        $peminjam->update([
            'nama_peminjam' => $request->nama_peminjam,
            'no_hp'         => $request->no_hp,
            'alamat'        => $request->alamat,
        ]);

        return redirect()
            ->route('peminjam.index')
            ->with('success', 'Data peminjam berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $peminjam = Peminjam::findOrFail($id);

        $peminjam->delete();

        return redirect()
            ->route('peminjam.index')
            ->with('success', 'Data peminjam berhasil dihapus.');
    }
}
