@extends('layouts.app')

@section('title', 'Data Peminjaman')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h3>Data Peminjaman</h3>

        <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">

            Tambah Peminjaman

        </a>

    </div>

    <table class="table table-bordered table-striped">

        <thead class="table-dark">

            <tr>

                <th width="60">No</th>
                <th>Kode Pinjam</th>
                <th>Tanggal</th>
                <th>Peminjam</th>
                <th>Barang</th>
                <th width="100">Qty</th>

            </tr>

        </thead>

        <tbody>

            @forelse($peminjaman as $item)
                @php
                    $detail = $item->detailPeminjaman->first();
                @endphp

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $item->kode_pinjam }}</td>

                    <td>{{ $item->tanggal_pinjam }}</td>

                    <td>{{ $item->peminjam->nama_peminjam }}</td>

                    <td>
                        {{ $detail?->barang?->nama_barang ?? '-' }}
                    </td>

                    <td>
                        {{ $detail?->qty ?? '-' }}
                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6" class="text-center">

                        Belum ada transaksi peminjaman.

                    </td>

                </tr>
            @endforelse

        </tbody>

    </table>

@endsection
