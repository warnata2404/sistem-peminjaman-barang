@extends('layouts.app')

@section('title', 'Data Peminjaman')

@section('content')

    <div class="d-flex justify-content-between mb-3">

        <h3>Data Peminjaman</h3>

        <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">

            Tambah Peminjaman

        </a>

    </div>

    <table class="table table-bordered">

        <thead>

            <tr>

                <th>No</th>
                <th>Kode Pinjam</th>
                <th>Tanggal</th>
                <th>Peminjam</th>

            </tr>

        </thead>

        <tbody>

            @forelse($peminjaman as $item)
                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $item->kode_pinjam }}</td>

                    <td>{{ $item->tanggal_pinjam }}</td>

                    <td>{{ $item->peminjam->nama_peminjam }}</td>

                </tr>

            @empty

                <tr>

                    <td colspan="4" class="text-center">

                        Belum ada transaksi.

                    </td>

                </tr>
            @endforelse

        </tbody>

    </table>

@endsection
