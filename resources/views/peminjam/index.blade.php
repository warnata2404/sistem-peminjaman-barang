@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">

        <h3>Data Peminjam</h3>

        <a href="{{ route('peminjam.create') }}" class="btn btn-primary">
            Tambah Peminjam
        </a>

    </div>

    @if (session('success'))
        <div class="alert alert-success">

            {{ session('success') }}

        </div>
    @endif

    <table class="table table-bordered table-striped">

        <thead>

            <tr>

                <th width="60">No</th>
                <th>Nama Peminjam</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th width="180">Aksi</th>

            </tr>

        </thead>

        <tbody>

            @forelse($peminjam as $item)
                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $item->nama_peminjam }}</td>

                    <td>{{ $item->no_hp }}</td>

                    <td>{{ $item->alamat }}</td>

                    <td>

                        <a href="{{ route('peminjam.edit', $item->id) }}" class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form action="{{ route('peminjam.destroy', $item->id) }}" method="POST" style="display:inline">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin hapus data ini?')">

                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" class="text-center">

                        Tidak ada data peminjam.

                    </td>

                </tr>
            @endforelse

        </tbody>

    </table>
@endsection
